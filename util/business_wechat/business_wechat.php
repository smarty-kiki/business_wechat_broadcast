<?php

function business_wechat_send_text_to_group_robot($url, $message, $mentioned_list = [], $mentioned_mobile_list = [])
{
    return http([
        'url' => $url,
        'data' => json([
            'msgtype' => 'text',
            'text' => [
                'content' =>  $message,
                "mentioned_list" => $mentioned_list,
                "mentioned_mobile_list" => $mentioned_mobile_list,
            ],
        ]),
    ]);
}
