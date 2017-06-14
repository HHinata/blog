<?php
class conn
{
    var $servername = "localhost";
    var $username = "root";
    var $password = "869628168";
    public function operation_insert_user($userid, $username, $pass)
    {
        $pid=$this->operation_query_count_user()->rowCount()+1;
        $createtime = date("Y-m-d h:i:s", time());
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {

            $stmt = $conn->prepare("insert into user (uid,password,name,pid,createtime,updatetime,status)
                                              values(:uid,:password,:name,:pid,:createtime,:updatetime,:status)");
            $stmt->bindParam(':name', $username);
            $stmt->bindParam(':uid', $userid);
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':pid', $pid);
            $stmt->bindParam(':createtime', $createtime);
            $stmt->bindParam(':updatetime', $updatetime);
            $stmt->bindParam(':status',$status);
            $name = $username;
            $uid = $userid;
            $password = $pass;
            $updatetime = $createtime;
            $status = 1;
            $stmt->execute();
            $coon=null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn=null;
    }
    public function operation_query_count_userpass($uid_c)
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $stmt = $conn->prepare("select * from user where uid=:uid");
            $stmt->bindParam(':uid', $uid);
            $uid = $uid_c;
            $stmt->execute();
            $row = $stmt->fetch();
            $conn=null;
            return $row['password'];
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function operation_query_count_user($id = '0')
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($id == '0')
        {
            try
            {
                $stmt = $conn->prepare("select * from user");
                $stmt->execute();
                $conn=null;
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        else
        {
            $stmt = $conn->prepare("select * from user where uid=:uid");
            $stmt->bindParam(':uid', $uid);
            $uid = $id;
            $stmt->execute();
            $conn=null;
            return $stmt;
        }
    }
    public function operation_query_count_blog($uid_c = '-1')
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //  echo $uid_c;
        if($uid_c != '-1')
        {
       //     echo $uid_c;
            try
            {
                $stmt = $conn->prepare("select * from blog where status=1 and uid=:uid ");
                $stmt->bindParam(':uid', $uid);
                $uid=$uid_c;
                $stmt->execute();
                $pid = $stmt->rowCount();
                $conn = null;
                return $pid;
            }
            catch (PDOException $e)
            {
                $conn = null;
                echo $e->getMessage();
            }
        }
        else
        {
            try
            {
                $stmt = $conn->prepare("select * from blog");
                $stmt->execute();
                $pid = $stmt->rowCount();
                $conn = null;
                return $pid;
            }
            catch (PDOException $e)
            {
                $conn = null;
                echo $e->getMessage();
            }
        }
    }
    public function operation_query_blog($startCount_c,$perNumber_c,$uid_c)
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $stmt = $conn->prepare("select * from blog where uid=:uid AND status=1 order by id desc limit :startCount,:perNumber");
            $stmt->bindParam(':uid', $uid);
            $stmt->bindParam(':startCount', $startCount);
            $stmt->bindParam(':perNumber', $perNumber);
            $uid = $uid_c;
            $startCount = $startCount_c;
            $perNumber = $perNumber_c;
            $stmt->execute();
            $conn = null;
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn = null;
    }
    public function operation_query_blog_one($id_c)
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $stmt = $conn->prepare("select * from blog where id=:id");
            $stmt->bindParam(':id', $id);
            $id = $id_c;
            $stmt->execute();
            $conn = null;
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn = null;
    }
    public function operation_insert_blog($uid_c, $title_c, $data_c,$id_c)
    {
        $pid_c=$this->operation_query_count_blog()+1;
        $createtime = date("Y-m-d h:i:s", time());
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $stmt = $conn->prepare("insert into blog (id,title,data,uid,pid,createtime,updatetime,status)
                                              values(:id,:title,:data,:uid,:pid,:createtime,:updatetime,:status)");
            $stmt->bindParam(':uid', $uid);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':pid', $pid);
            $stmt->bindParam(':createtime', $createtime);
            $stmt->bindParam(':updatetime', $updatetime);
            $stmt->bindParam(':status',$status);
            $uid = $uid_c;
            $pid = $pid_c;
            $createtime = date("Y-m-d h:i:s", time());
            $updatetime = $createtime;
            $status = 1;
            $id = $id_c;
            $title = $title_c;
            $data = $data_c;
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn=null;
    }
    public function operation_delete_blog($id_c)
    {
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {

            $stmt = $conn->prepare("update blog set status=0 where id =:id");
            $stmt->bindParam(':id', $id);
            $id = $id_c;
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn=null;
    }
    public function operation_update_blog($id_c,$title_c,$data_c)
    {
        $updatetime_c = date("Y-m-d h:i:s", time());
        $conn = new PDO("mysql:host=$this->servername;dbname=blog", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo $id_c."   ".$title_c."   ".$data_c;
        try
        {
            $stmt = $conn->prepare("update blog set title=:title,data=:data,updatetime=:updatetime where id =:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':updatetime', $updatetime);
            $id = $id_c;
            $updatetime = $updatetime_c;
            $title = $title_c;
            $data = $data_c;
            $stmt->execute();
            $conn=null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn=null;
    }
}
?>
