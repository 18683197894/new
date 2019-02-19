<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\MemberBackend;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    //
    public function welcome()
    {
    	$backend = \session('backend');
		return view('Backend.Member.wolcome',['backend'=>$backend]);
    }
    public function personal(Request $request)
    {	
        $id = \session('backend')['id'];
        $member = MemberBackend::where('id',$id)->with('Roles')->get()->toArray();
        $rule = !empty($member[0]['roles'])?Role::find($member[0]['roles']['id'])->rules->toArray():array();
    	return view('Backend.Member.personal',[
            'member'=>$member[0],
            'rule' => $rule
            ]);
    }
    public function personal_edit(Request $request)
    {	
    	sleep(1);
    	$data = $request->except('_token','password','password_new','password_news','id');
    	$models = MemberBackend::find($request->id);
    	if($models)
    	{
    		$password = $request->post('password',false);
    		$password_info = '';
    		if($password)
	    	{
	    		if(\Hash::check($password,$models->password_hash))
	    		{
	    			$models->password_hash = \Hash::make($request->password_new);
	    			$password_info = '密码修改下次登入生效';
	    		}else
	    		{
	    			$this->error_message('密码错误');
	    		}
	    	}
	    	$models->nickname = $data['nickname'];
	    	$models->sex = $data['sex'];
	    	$models->phone = $data['phone'];
	    	$models->email = $data['email'];
	    	$res = $models->save();
	    	if($res)
	    	{
	    		$this->success_message('修改成功 '.$password_info);
	    	}else
	    	{
	    		$this->error_message('修改失败');
	    	}
    	}else
    	{
    		$this->error_message('数据不存在');
    	}
    	
    }

    public function personal_head_portrait(Request $request)
    {
        
    	$models = MemberBackend::find($request->id);
    	if($models)
    	{
    		if($request->hasFile('photo'))
    		{
    			if($request->file('photo')->isValid())
    			{
    				$extension = $request->photo->extension();
    				$newName = time().mt_rand(111111,999999).'.'.$extension;
    				$url = $request->photo->storeAs('/member/images',$newName,'backend');
    				if($url)
    				{	
    					$image = $models->head_portrait;
    					$path = env('UPLOAD_BACKEND').'/'.$url;
    					$models->head_portrait = $path;
    					$res = $models->save();
    					if($res)
    					{  
                            if($image)
                            {
                                @unlink(substr($image,1));
                            }
    						$this->success_message('上传成功',['src'=>asset($path)]);
    					}else
    					{
                            @unlink(substr($path,1));
    						$this->error_message('上传失败');
    					}
    				}
    			}
    		}
    	}
    	$this->error_message('上传失败');
    	
    }

    public function destroy(Request $request)
    {
        $id = intval($request->ids);
        if($id !== $request->session()->get('backend')['id'])
        {

            $this->error_message('删除失败');
        }

        $res = MemberBackend::find($id);
        if($res->type == 10)
        {
            $this->error_message('超级管理员无法被删除');
        }

        $image = $res->head_portrait;
        if($res->delete())
        {   
            if($image)
            {
                @unlink(substr($image,1));
            }         
 
            \Session::forget('backend');
            $this->success_message('删除成功',['url'=>url('backend/origin-login')],304);
        }else
        {
            $this->error_message('删除失败');
        }
    }
    
}
