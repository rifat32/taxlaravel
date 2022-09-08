<?php

return [
    "roles_permission" => [
        [
            "role" => "admin",
            "permissions" => [
                "all",
            ],
        ],
        [
            "role" => "superadmin",
            "permissions" => [
                "all",
                "election_area",
                "user_management",
            ],
        ],


    ],
    "roles" => [
        "admin",
        "superadmin",

    ],
    "permissions" => [
      "all",
      "election_area",
      "user_management"



    ],

];
