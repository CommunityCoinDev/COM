<?php
require("config.inc.php");

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value
function callAPI($method, $uri, $data = null, $token = null)
{
    $headers = array();
    $curl = @curl_init();
    if( $method == "POST" )
    {
        @curl_setopt($curl, CURLOPT_POST, 1);
        
        if ($data)
        {
            if( is_array($data) || is_object($data) )
                @curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                else
                {
                    @curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    array_push($headers, 'Content-Type: application/json' );
                    array_push($headers, 'Content-Length: '.strlen($data) );
                }
        }
    }
    else if( $method == "PUT" )
        @curl_setopt($curl, CURLOPT_PUT, 1);
        
        if( $token !== null )
            array_push($headers, 'authorization: '.$token->prefix.' '.$token->token);
            
            @curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            @curl_setopt($curl, CURLOPT_URL, URL.$uri);
            @curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = @curl_exec($curl);
            
            @curl_close($curl);
            
            return $result;
}

// get the access token
$token = json_decode(callAPI("POST", "auth/token", array("email" => AUTH_EMAIL, "password" => AUTH_PASSWORD)));
if( $token === null )
    exit("Couldnt log in");
    
// get possible payouts
$payouts = json_decode(callAPI("GET", "extern/payouts", null, $token));

if( count($payouts) != 0 )
{
    $i = 0;
    // process payouts
    foreach( $payouts as $item )
    {        
        $out = shell_exec(COMD_CALL." sendtoaddress ".escapeshellcmd($item->walletAddress." ".$item->amount." ".$item->id).' 2>&1');
        
        if( is_array($out) )
            $out = implode("\n", $out);
        
        $out = trim($out);
            
        // check for error
        if (stripos($out, 'error') !== false)
            $item->error = array($out);
        else
            $item->transactionId = $out;
            
        callAPI("POST", "extern/payouts", json_encode($item), $token);
        $i++;
    }
}    