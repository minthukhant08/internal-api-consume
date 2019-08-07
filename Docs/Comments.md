# Comment Feature
The endpoint controls comment resources.


# Retrieve the list of comments [/v1/comments]

### GET

+ Parameters
    + limit : `30` (optional, integer)
    + offset : `0` (optional, integer)
    + activity_id : `1` (optional, integer) - To filter by activity id.


Retrieve the list of comments.

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/comments",
                    "limit": 2,
                    "offset": 0,
                    "total": 10
                },
                "data": [
                    {
                        "id": 1,
                        "descriptions": "Quae unde doloribus nihil cum non odit.",
                        "activity_id": 1,
                        "user": {
                            "id": 4,
                            "name": "May Durgan",
                            "image": "http://localhost:8000/api/v1/users/image/1"
                        }
                    },
                    {
                        "id": 2,
                        "descriptions": "Ut error voluptatem est.",
                        "activity_id": 10,
                        "user": {
                            "id": 8,
                            "name": "Mr. Montana Keebler MD",
                            "image": "http://localhost:8000/api/v1/users/image/2"
                        }
                    }
                ],
                "errors": {},
                "duration": 0.008
            }


## Creates a comment [/v1/comments]

  Creates a comment.

### POST
+ Parameters
    + descriptions: `some comments` (required, string).
    + user_id: `1` (required, unique, integer).
    + activity_id: `3` (required, integer).


+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/comments",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "id": 11
                },
                "errors": {},
                "duration": 0.084
            }

+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/comments",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                        {
                            "attribue": "descriptions",
                            "message": "The descriptions field is required."
                        },
                        {
                            "attribue": "user_id",
                            "message": "The user id field is required."
                        },
                        {
                            "attribue": "user_id",
                            "message": "The selected user id is invalid."
                        },
                        {
                            "attribue": "activity_id",
                            "message": "The activity id field is required."
                        },
                        {
                            "attribue": "activity_id",
                            "message": "The selected activity id is invalid."
                        }
                    ]
                },
                "duration": 0.005
            }

## Updates a Comment [/v1/comments/:id]

  Updates a comment that correspond to the ID as the last segment of the URL.

  ### PUT

  + Parameters
      + id: `1` (required, string). - To filter by specific comment id.
      + descriptions: `some comments` (optional, string).
      + user_id: `1` (optional, unique, integer).
      + activity_id: `3` (optional, integer).



+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "PUT",
                    "endpoint": "api/v1/comments/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "updated": 1
                },
                "errors": {},
                "duration": 0.012
            }

+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "PUT",
                    "endpoint": "api/v1/comments/1",
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
                "duration": 0.005
            }


## Deletes a Comment [/v1/comments/:id]

  Deletes a comment that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + id: `1` (required, integer) - A primary key of comment id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/comments/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "deleted": 1
                },
                "errors": {},
                "duration": 0.068
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/comments/145",
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
