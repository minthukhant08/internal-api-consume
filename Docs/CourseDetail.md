# Course Detail Feature
The endpoint controls Details of courses.

## Creates a Course Detail [/v1/course_detail]

Creates a Detail of course.

### POST  
+ Parameters
    + course_id: `1` (required, integer). - to make a relation with Course.
    + topic: `Front End` (required, string).
    + descriptions: `some paragraph`  (required, string).


+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/course_detail",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "id": 11
                },
                "errors": {},
                "duration": 0.063
            }


+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/course_detail",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                          {
                              "attribue": "course_id",
                              "message": "The course id field is required."
                          },
                          {
                              "attribue": "course_id",
                              "message": "The selected course id is invalid."
                          },
                          {
                              "attribue": "topic",
                              "message": "The topic field is required."
                          },
                          {
                              "attribue": "descriptions",
                              "message": "The descriptions field is required."
                          }
                    ]
                },
                "duration": 0.263
            }

## Updates a Course Detail [/v1/course_detail/:id]

  Updates a detail of course that correspond to the ID as the last segment of the URL.

### PUT

  + Parameter
    + id:`1` (required, string). - To filter by specific course detail id.
    + topic: `Back End` (optional, string).
    + descriptons: `some paragraph` (optional, string).
    + course_id: `1` (optional, integer).


  + Response 201 (application/json; charset=utf-8)

      + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "PUT",
                    "endpoint": "api\/v1\/course_detail\/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "updated": 1
                },
                "errors": {},
                "duration": 0.057
            }


+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "PUT",
                    "endpoint": "api/v1/course_detail/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                        {
                            "attribue": "course_id",
                            "message": "The selected course id is invalid."
                        }
                    ]
                },
                "duration": 0.055
            }


## Deletes a Course Detail [/v1/course_detail/:id]

  Deletes a course detail that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + id: `1` (required, integer) - A primary key of course detail id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api\/v1\/course_detail\/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "deleted": 1
                },
                "errors": {},
                "duration": 0.054
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/course_detail/178",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The resource that match ID: ( 178 ) does not found.",
                    "code": 400001
                    },
                "duration": 0.054
            }
