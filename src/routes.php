<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Content-type:application/json",true);

   // edit parent 
   $app->any('/editparent/[{par_id}&&{par_title}&&{par_name}&&{par_sname}&&{par_tel}]',function ($request, $response, $args){
    $sql = "UPDATE parent2 SET par_title=:par_title,par_name=:par_name,par_sname=:par_sname,par_tel=:par_tel WHERE par_id=:par_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("par_id", $args['par_id']);
    $sth->bindParam("par_title", $args['par_title']);
    $sth->bindParam("par_name", $args['par_name']);
    $sth->bindParam("par_sname", $args['par_sname']);
    $sth->bindParam("par_tel", $args['par_tel']);
    if($sth->execute()==true){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });

    // edit parent lat&long
   $app->any('/editparentlatlong/[{par_id}&&{latitude}&&{longitude}]',function ($request, $response, $args){
    $sql = "UPDATE parent2 SET latitude=:latitude,longitude=:longitude WHERE par_id=:par_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("par_id", $args['par_id']);
    $sth->bindParam("latitude", $args['latitude']);
    $sth->bindParam("longitude", $args['longitude']);
    if($sth->execute()==true){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });

    // edit parent lat&longNull
   $app->any('/editparentlatlongNull/[{par_id}&&{latitude}&&{longitude}]',function ($request, $response, $args){
    $sql = "UPDATE parent2 SET latitude=:latitude,longitude=:longitude WHERE par_id=:par_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("par_id", $args['par_id']);
    $sth->bindParam("latitude", $args['latitude']);
    $sth->bindParam("longitude", $args['longitude']);
    if($sth->execute()==true){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });

   
    // parLogin

    $app->get('/parLogin/[user={par_user}&&pass={par_password}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM parent2 WHERE par_user=:par_user and par_password=:par_password");
        $sth->bindParam("par_user", $args['par_user']);
        $sth->bindParam("par_password", $args['par_password']);
        $sth->execute();
        $todos = $sth->fetch();   
        return $this->response->withJson($todos);
    });

    // parentall
    $app->get('/parentall/[user={par_user}&&pass={par_password}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM parent2  WHERE par_user=:par_user and par_password=:par_password");
        $sth->bindParam("par_user", $args['par_user']);
        $sth->bindParam("par_password", $args['par_password']);
        $sth->execute();
        $todos = $sth->fetch();   
        return $this->response->withJson($todos);
    });
   
    