<?php
    if(isset($_POST['message']) && isset($_POST['Name'])) {
        $message = $_POST['message'];
        $username = $_POST['Name'];

        $webhookurl = "";//put your discord webhook url in the quotes
        $timestamp = date("c", strtotime("now"));
        $json_data = json_encode([
            // Message
            "content" => "",
            // Username
            "username" => "Email Bot",
            // Text-to-speech
            "tts" => false,
                // File upload
            // "file" => "",
                // Embeds Array
                "embeds" => [
                    [
                        // Embed Type
                        "type" => "rich",
                        // Timestamp of embed must be formatted as ISO8601
                        "timestamp" => $timestamp,
                        // Embed left border color in HEX
                        "color" => hexdec( "3366ff" ),
                        // Footer
                        "footer" => [
                            "text" => "Made by Chris Hansen",
                        ],
                        // Author
                        "author" => [
                            "name" => "Chrishansen.tk",
                            "url" => "https://chrishansen.tk/" //keep me as author pls <3
                        ],
                    
                        "fields" => [
                            [
                                "name" => "Username",
                                "value" => ($username),
                                "inline" => false
                            ],
                            [
                                "name" => "Message",
                                "value" => ($message),
                                "inline" => false
                            ]
                        ]
                    ]
                ]
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
        
        
            $ch = curl_init( $webhookurl );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        
            $response = curl_exec( $ch );
            curl_close( $ch );
            };
?>
