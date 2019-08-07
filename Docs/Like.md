# Like Feature
The endpoint controls like Resources.


## Creates a Like [/v1/likes]

  Creates a like.

### POST
+ Parameters
    + user_id: `1` (required, string).
    + activity_id: `2` (required, unique, string).


+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                      "method": "POST",
                      "endpoint": "api/v1/likes",
                      "limit": 30,
                      "offset": 0
                },
                "data": {
                    "id": 11
                },
                "errors": {},
                "duration": 0.06
            }

+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/likes",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                          {
                              "attribue": "user_id",
                              "message": "The selected user id is invalid."
                          },
                          {
                              "attribue": "activity_id",
                              "message": "The selected activity id is invalid."
                          }
                    ]
                },
                "duration": 0.014
            }


## Deletes a Like [/v1/likes/:id]

  Deletes a like that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + id: `1` (required, integer) - A primary key of like id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/likes/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "deleted": 1
                },
                "errors": {},
                "duration": 0.105
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/likes/145",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The resource that match ID: ( 145 ) does not found.",
                    "code": 400001
                },
                "duration": 0.008
            }
