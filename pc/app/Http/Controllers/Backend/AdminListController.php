<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\MemberBackend;
use App\Model\Cate;
use App\Model\Rule;
use App\Model\Role;
use App\Model\RoleRule;
use App\Model\SysSystemConfig;
class AdminListController extends Controller
{   

    public function index(Request $request)
    {   
        $this->SysConfingInit();
        $id = \session('backend')['id'];
        $start = $request->get('start');
        $end = $request->get('end');

        $username = $request->get('username','');
        $start = empty($start)?0:strtotime($start);
        $end = empty($end)?time():strtotime($end)+86400;
        $role = Role::get();

        $member = MemberBackend::where('created_at','>=',$start)
                                ->where('created_at','<=',$end)
                                ->where('username','like',"%{$username}%")
                                ->orderByRaw("FIELD(id,{$id}) DESC")
                                ->orderBy("created_at")
                                ->with(['roles'=>function($query){
                                    return $query->select('id','role_name')->get(); 
                                }])
                                ->paginate($this->_sizePage);
       
        return view('Backend.AdminList.index',[
                    'member'=>$member,
                    'role'=>$role,
                    'request'=>$request->all()
            ]);
    }

    public function index_role(Request $request)
    {
        $id = $request->post('id',false); 
        $role_id = $request->post('role_id',null); 
        $models = MemberBackend::find($id);
        
        if($models)
        {
            if($models->type == 10)
            {
                $this->error_message('超级管理员无法修改角色');
            }

            $role = Role::find($role_id);
            if(!$role)
            {   
                $role_name = '无';
            }else
            {

                $role_name = $role->role_name;
            }

            $models->role_id = $role_id;
            $res = $models->save();
            if($res)
            {
                $this->success_message('修改成功',['role_name'=>$role_name]);
            }else
            {
                $this->error_message('修改失败');
            }
        }else
        {
            $this->error_message('数据不存在');
        }
    }
    public function index_add(Request $request)
    {
        $data = $request->except('_token','password_s','password');
        $data['password_hash'] = Hash::make($request->password);
        $data['type'] = 1;
        $data['head_portrait'] = NULL;
        $res = MemberBackend::where('username',$data['username'])->first();
        if(!$res)
        {
            $models = MemberBackend::create($data);
            if($models)
            {
                return redirect('/backend/adminlist/index')->with(['success_message'=>'新增成功']);
            }else
            {
                return redirect('/backend/adminlist/index')->with(['error_message'=>'添加失败']);
            }
        }else
        {
            return redirect('/backend/adminlist/index')->with(['error_message'=>'登录名已存在']);
        }
    }
    public function index_edit(Request $request)
    {
        $id = intval($request->get('id'));
        $member = MemberBackend::where('id',$id)
                ->with(['roles'=>function($query){
                    return $query->select('id','role_name')->get();
                }])
                ->get()
                ->toArray();
        $rule = !empty($member[0]['roles'])?Role::find($member[0]['roles']['id'])->rules->toArray():array();
        return view('Backend.Member.personal',[
            'member'=>$member[0],
            'rule' => $rule
            ]);
    }
    public function index_status(Request $request)
    {   
        $models = MemberBackend::find($request->id);
        if($models)
        {
            if($models->type == 10)
            {

                $this->error_message('失败 超级管理员无法被停用');
            }
            $models->status = $request->status;
            $res = $models->save();
            if($res)
            {
                $this->success_message();
            }else
            {
                $this->error_message();
            }
        }else
        {
            $this->error_message();
        }
    }

    public function index_del(Request $request)
    {   
        $ids = $request->ids;
        $models = MemberBackend::find($ids);
        if(count($ids) <= 1)
        {   
            if($models[0]->type == 10)
            {
                $this->error_message('删除失败 超级管理员无法被删除');
            }
        }
        if($models)
        {
            foreach($models->toArray() as $k => $val)
            {   
                if($val['type'] == 10)
                {   
                    $key = array_search($val['id'],$ids);
                    unset($ids[$key]);
                }else
                {
                    if($val['head_portrait'])
                    {
                        @unlink('./'.$val['head_portrait']);
                    }
                }
            }
            $res = MemberBackend::destroy($ids);
            if($res)
            {
                $this->success_message('删除成功',$ids);
            }else
            {
                $this->error_message('删除失败');
            }
        }else
        {
            $this->error_message('删除失败');
        }
    }

    public function cate(Request $request)
    {   

        $this->SysConfingInit();
        $cate = Cate::with(['rules'=>function($query){
                        return $query->select('id','rule_name','cate_id')->orderBy('created_at')->get();
                    }])
                    ->orderBy('created_at','DESC')
                    ->paginate($this->_sizePage);
        return view('Backend.AdminList.cate',['cate'=>$cate]);
    }

    public function cate_add(Request $request)
    {   
        $cate_name = $request->cate_name;
        $models = Cate::where('cate_name',$cate_name)->first();
        if(!$models)
        {   
            $res = Cate::create(['cate_name'=>$request->cate_name]);
            return redirect('/backend/adminlist/cate')->with(['success_message'=>'添加成功']);
        }else
        {
            return redirect('/backend/adminlist/cate')->with(['error_message'=>'添加失败  分类名重复']);
        }
    }
    public function cate_del(Request $request)
    {
        $ids = $request->ids;
        foreach($ids as $v)
        {
            $models = Rule::where('cate_id',$v)->delete();
           
        }
        $res = Cate::destroy($ids);
        if($res)
        {
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败');
        }
    }

    public function cate_edit(Request $request)
    {
        $id = intval($request->id);
        $cate_name = $request->cate_name;
        $unique = Cate::where('cate_name',$cate_name)->first();
        if(!$unique || $unique->id == $id)
        {
            $models = Cate::find($id);
            if($models)
            {
                $models->cate_name = $cate_name;
                $res = $models->save();
                if($res)
                {
                    $this->success_message('编辑成功');
                }else
                {
                    $this->error_message('编辑失败');
                }
            }else
            {
                $this->error_message('分类不存在');
            }
        }else
        {
            $this->error_message('分类名重复');
        }   
    }

    public function rule(Request $request)
    {   
        $this->SysConfingInit();
        $app = app();
        $routes = $app->routes->getRoutes();
        $path = [];
        foreach ($routes as $k=>$value)
        {
            if( isset($value->action['middleware']) && in_array('rule',$value->action['middleware']))
            {
                $path[$k] = $value->uri;
            }
        }
        
        $cate = Cate::orderBy('created_at','DESC')->get()->toArray();

        $rule = Rule::orderBy('created_at','DESC')
                    ->with(['Cates'=>function($query){
                        $query->select('id','cate_name')->get();
                    }])
                    ->paginate($this->_sizePage);
       
        return view('Backend.AdminList.rule',[
            'rule'=>$rule,
            'cate'=>$cate,
            'path'=>$path
            ]);
    }

    public function rule_add(Request $request)
    {
        $data = $request->except("_token");
        $res = Rule::create($data);
        if($res)
        {
            return redirect('/backend/adminlist/rule')->with(['success_message'=>'新增成功']);
        }else
        {
            return redirect('/backend/adminlist/rule')->with(['success_message'=>'新增失败']);
            
        }
    }


    public function rule_del(Request $request)
    {   
        $ids = $request->ids;
        $res = Rule::destroy($ids);
        if($res)
        {
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败');
        }
    }

    public function rule_edit(Request $request)
    {
        $id = $request->id;
        $rule_name = $request->rule_name;
        $models = Rule::find($id);
        if($models)
        {
            $models->rule_name = $rule_name;
            $models->save();
            $this->success_message('编辑成功');
        }else
        {
            $this->error_message('编辑失败 权限不存在');
        }
    }

    public function role(Request $request)
    {   
        $this->SysConfingInit();
        $role_name = $request->get('role_name','');
        // $res = Role::with('rules')->get()->toArray();
       
        $role = Role::where('role_name','like',"%$role_name%")
                    ->orderBy('created_at','DESC')
                    ->with(['rules'=>function($query){
                        return $query->select('rule_name','cate_id','rule_id')->orderBy('cate_id')->get();
                    }])
                    ->paginate($this->_sizePage);
        $cate = Cate::orderBy('created_at')
                    ->with(['rules'=>function($query){
                        return $query->select('id','rule_name','cate_id')->orderBy('created_at')->get();
                        }])
                    ->get();
    
        return view('Backend.AdminList.role',[
            'role'=>$role,
            'cate'=>$cate,
            'request'=>$request->all(),
            ]);
    }
    public function role_add(Request $request)
    {
        
        $role = $request->except('_token','rule_ids');
        $res = Role::create($role);
        // $res = true;
        if($res)
        {
            if($request->rule_ids)
            {
                $rule_ids = explode(',',$request->rule_ids);
                foreach($rule_ids as $key => $value)
                {   

                    $rule_role['rule_id'] = intval($value);
                    $rule_role['role_id'] = $res->id;
                    RoleRule::create($rule_role);                

                }
          
            }

            return redirect('/backend/adminlist/role')->with(['success_message'=>'新增成功']);

        }else
        {
            return back()->with(['error_message'=>'新增失败']);
        }
    }

    public function role_del(Request $request)
    { 
        $ids = $request->ids;
        foreach($ids as $k => $v)
        {
            RoleRule::where('role_id',$v)->delete();
        }

        $res = Role::destroy($ids);
        if($res)
        {
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败');
        }
    }

    public function role_edit(Request $request)
    {   
        $page = $request->post('page',1);
        $keyword = $request->post('keyword','');
        $id = $request->id;
        $models = Role::find($id);
        if($models)
        {
            RoleRule::where('role_id',$id)->delete();
            if($request->rule_ids)
            {
                $rule_ids = explode(',',$request->rule_ids);
                foreach($rule_ids as $key => $value)
                {   

                    $rule_role['rule_id'] = intval($value);
                    $rule_role['role_id'] = $id;
                    RoleRule::create($rule_role);                

                }
            }
        $models->role_name = $request->role_name;
        $models->describe = $request->describe;
        $models->save();
        return redirect('/backend/adminlist/role?page='.$page.'&role_name='.$keyword)->with(['success_message'=>'修改成功']);

        }else
        {
            return redirect('/backend/adminlist/role?page='.$page)->with(['error_message'=>'修改失败 角色不存在']);
        }
    }
}
