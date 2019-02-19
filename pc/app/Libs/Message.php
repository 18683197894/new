<?php 
	class Message{
		private $zend_config = [];
		public function SendMessage($phone=null,$content=null,$ip=null)
		{
			if(!$phone && !$content && !$ip)
			{
				return $this->error_message('参数不完整');
			}
			if(!$this->zend_init())
			{
				return $this->error_message('短信配置缺失');
			}
			if($this->zend_config['type'] == 1)
			{
				$res = $this->zend_code_hy($phone,$content);
			}

			if($res == 'ok')
			{	
				App\Model\ShortMessageLog::create(array('phone'=>$phone,'content'=>$content,'ip'=>$ip,'status'=>1,'info'=>$res));	
				return $this->success_message('短信发送成功');
			}else
			{	
				App\Model\ShortMessageLog::create(array('phone'=>$phone,'content'=>$content,'ip'=>$ip,'status'=>0,'info'=>$res));
				return $this->error_message($res);
			}
		}
		private function zend_init()
		{
			$zend_config = App\Model\SysZendConfig::find(1);
			if(!$zend_config)
			{
				return false;
			}
			$this->zend_config = $zend_config->toArray();
			return true;
		}
		private function zend_code_hy($phone,$str)
    	{	
	    	//短信接口地址
	    	$url =$this->zend_config['hy_zendcodeurl'];

	    	//地址参数
			$mttime=date("YmdHis");
			$post_data['action']   = 'send';
			$post_data['userid']   = $this->zend_config['hy_userid'];
			$post_data['account']  = $this->zend_config['hy_accound'];
			$post_data['password'] = $this->zend_config['hy_password'];
			$post_data['mobile']   = $phone;
			$post_data['content']  = $str;
			$post_data['sendTime'] = '';
			
			$o = "";

			foreach( $post_data as $k => $v )
			{
			     $o .= $k.'='.urlencode($v).'&';
			}

			$url_data = substr($o,0,-1);
			// dd($url_data);

			//发送短信的方法
			function request_post($url ='', $param = '') {
			   if (empty($url) ||empty($param)) {
			      return false;
			   }
			 
			   $postUrl= $url;
			   $curlPost= $param;
			   $ch =curl_init();//初始化curl
			   curl_setopt($ch,CURLOPT_URL,$postUrl);//抓取指定网页
			   curl_setopt($ch,CURLOPT_HEADER, 0);//设置header
			   curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且屏幕上
			   curl_setopt($ch,CURLOPT_POST, 1);//post提交方式
			   curl_setopt($ch,CURLOPT_POSTFIELDS, $curlPost);
			   $data= curl_exec($ch);//运行curl
			   curl_close($ch);
			   return $data;
			}

			//将发送短信返回的信息XML 转化为数组
			function xmlToArray($xml){ 
	 
				 //禁止引用外部xml实体 
				 
				libxml_disable_entity_loader(true); 
				 
				$xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
				 
				$val = json_decode(json_encode($xmlstring),true); 
				 
				return $val; 
				 
			}

			$res = request_post($url,$url_data);
			$resarr = xmlToArray($res);

			//直接return 成功或错误的信息 
			return urldecode($resarr['message']);
    	}
		private function success_message($info = '成功',$data='',$code = 200)
	    {	

				$ret = array('code'=>$code,'data'=>$data,'info'=>$info);
	    		return $ret;
	    }

	    private function error_message($info='失败',$data='',$code = 501)
	    {	
			    $ret = array('code'=>$code,'data'=>$data,'info'=>$info);
	    		return $ret;
	    }

	}