# Activity Feature
The endpoint controls Activity resources.


# Retrieve the list of Activities [/v1/activities]

### GET

+ Parameters
    + limit : `30` (optional, integer)
    + offset : `0` (optional, integer)
    + name: `Soft Skills` (optional, string) - To filter by activity name.
    + speaker: `U Thein Oo` (optional, string) - To filter by speaker name.


Retrieve the list of users.

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/activities",
                    "limit": 2,
                    "offset": 0,
                    "total": 10
                },
                "data": [
                    {
                        "id": 1,
                        "name": "explicabo",
                        "remarks": "Nihil totam et necessitatibus omnis impedit et quibusdam.",
                        "date": "1976-11-12",
                        "speaker": "Edward Olson",
                        "descriptions": "Provident sunt iusto maxime non architecto sed. Necessitatibus pariatur voluptatem odit doloremque. Architecto molestiae et id. Rerum repudiandae nisi ex molestiae.",
                        "image": "http://localhost:8000/api/v1/activities/image/1",
                        "likes": 0,
                        "comments": "http://localhost:8000/api/v1/comments?activity_id=1"
                    },
                    {
                        "id": 2,
                        "name": "velit",
                        "remarks": "Esse rerum dolorum voluptatem iure laborum sit et.",
                        "date": "1979-01-23",
                        "speaker": "Prof. Jacquelyn Larson II",
                        "descriptions": "Fugiat ea facilis illo illo velit debitis. Culpa odio aut voluptates atque nihil labore aut. Ut consectetur velit cum ipsum.",
                        "image": "http://localhost:8000/api/v1/activities/image/2",
                        "likes": 0,
                        "comments": "http://localhost:8000/api/v1/comments?activity_id=2"
                    }
                ],
                "errors": {},
                "duration": 0.055
            }



## Retrieve a specific Activity [/v1/activities/:id]

 Retrieve a specific activity.

### GET

+ Parameter
    + id: `1` (required, integer) - To filter by specific activity id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/activities/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": [
                    {
                        "id": 1,
                        "name": "explicabo",
                        "remarks": "Nihil totam et necessitatibus omnis impedit et quibusdam.",
                        "date": "1976-11-12",
                        "speaker": "Edward Olson",
                        "descriptions": "Provident sunt iusto maxime non architecto sed. Necessitatibus pariatur voluptatem odit doloremque. Architecto molestiae et id. Rerum repudiandae nisi ex molestiae.",
                        "image": "http://localhost:8000/api/v1/activities/image/1",
                        "likes": 0,
                        "comments": "http://localhost:8000/api/v1/comments?activity_id=1"
                    }
                ],
                "errors": {},
                "duration": 0.061
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/activities/145",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The resource that match ID: ( 145 ) does not found.",
                    "code": 400001
                },
                "duration": 0.048
            }

## Get an Activity Image [/v1/activities/image/:id]

   Retrieve the image of an activity that correspond to the ID as the last segment of the URL.

   + Parameter
       + id: `7` (required, integer) - A primary key of activity id.


   + Response 200 (image/png)


![user_profile](images/2019/08/40845910.png)

## Creates an Activity [/v1/activities]

  Creates an activity.

### POST
+ Parameters
    + name: `Body Language` (required, string).
    + date: `1976-11-12` (required, date).
    + remarks: `some remarks` (required, string).
    + descriptions: `some descriptions` (required, string).
    + speaker_name: `U Thein Oo` (required, string).
    + image: `image.png` (required, image).


+ Response 201 (application/json; charset=utf-8)

    + Body
            {
              "success": 1,
              "code": 201,
              "meta": {
                  "method": "POST",
                  "endpoint": "api/v1/activities",
                  "limit": 30,
                  "offset": 0
              },
              "data": {
                  "id": 11
              },
              "errors": {},
              "duration": 0.094
            }

+ Response 400 (application/json; charset=utf-8)

    + Body
            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/activities",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                            {
                                "attribue": "name",
                                "message": "The name field is required."
                            },
                            {
                                "attribue": "date",
                                "message": "The date field is required."
                            },
                            {
                                "attribue": "date",
                                "message": "The date is not a valid date."
                            },
                            {
                                "attribue": "remarks",
                                "message": "The remarks field is required."
                            },
                            {
                                "attribue": "descriptions",
                                "message": "The descriptions field is required."
                            },
                            {
                                "attribue": "speaker_name",
                                "message": "The speaker name field is required."
                            },
                            {
                                "attribue": "image",
                                "message": "The image field is required."
                            },
                            {
                                "attribue": "image",
                                "message": "The image must be an image."
                            }
                    ]
                },
                "duration": 0.015
              }


## Updates an Activity [/v1/activities/:id]

  Updates an activity that correspond to the ID as the last segment of the URL.

  ### PUT

  + Parameters
      + id: `1` (required, string). - To filter by specific activity id.
      + name: `Body Language` (optional, string).
      + date: `1976-11-12` (optional, date).
      + remarks: `some remarks` (optional, string).
      + descriptions: `some descriptions` (optional, string).
      + speaker_name: `U Thein Oo` (optional, string).
      + image: `image.png` (optional, image).



+ Response 201 (application/json; charset=utf-8)

    + Body

            {
              "success": 1,
              "code": 200,
              "meta": {
                  "method": "PUT",
                  "endpoint": "api/v1/activities/1",
                  "limit": 30,
                  "offset": 0
              },
              "data": {
                  "updated": 1
              },
              "errors": {},
              "duration": 0.549
          }

+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "PUT",
                    "endpoint": "api/v1/activities/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                        {
                            "attribue": "date",
                            "message": "The date is not a valid date."
                        },
                        {
                            "attribue": "image",
                            "message": "The image must be an image."
                        }
                    ]
                },
                "duration": 0.002
            }


## Deletes an Activity [/v1/users/:id]

  Deletes an activity that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + user_id: `1` (required, integer) - A primary key of activity id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/activities/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "deleted": 1
                },
                "errors": {},
                "duration": 0.059
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/activities/1343",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The resource that match ID: ( 1343 ) does not found.",
                    "code": 400001
                },
                "duration": 0.006
            }
