# Course Feature
The endpoint controls Courses.-


# Retrieve the list of courses [/v1/courses]

### GET

+ Parameters
    + limit : `30` (optional, integer)
    + offset : `0` (optional, integer)


Retrieve the list of courses.

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/courses",
                    "limit": 2,
                    "offset": 0,
                    "total": 10
                },
                "data": [
                    {
                        "id": 3,
                        "name": "PHP",
                        "image": "http://localhost:8000/api/v1/courses/image/3",
                        "details": [
                            {
                                "id": 2,
                                "topic": "Front End",
                                "descriptions": "Maxime excepturi explicabo autem minima inventore tempora. Et nihil recusandae aliquid sequi voluptatem qui. Ipsum rem quo dolorum laudantium. Nisi voluptatem enim odio omnis eos magnam."
                            },
                            {
                                "id": 3,
                                "topic": "Pure PHP",
                                "descriptions": "Maxime excepturi explicabo autem minima inventore tempora. Et nihil recusandae aliquid sequi voluptatem qui. Ipsum rem quo dolorum laudantium. Nisi voluptatem enim odio omnis eos magnam."
                            },
                            {
                                "id": 4,
                                "topic": "Laravel",
                                "descriptions": "Maxime excepturi explicabo autem minima inventore tempora. Et nihil recusandae aliquid sequi voluptatem qui. Ipsum rem quo dolorum laudantium. Nisi voluptatem enim odio omnis eos magnam."
                            }
                        ]
                    },
                    {
                        "id": 4,
                        "name": "Java",
                        "image": "http://localhost:8000/api/v1/courses/image/4",
                        "details": [
                            {
                                "id": 10,
                                "topic": "Core Java",
                                "descriptions": "Accusantium reprehenderit voluptas enim dolores. Ad eligendi quis ipsa sit atque et expedita. Dolorem veritatis qui beatae fugiat. Et quidem et ea vero molestiae assumenda."
                            }
                        ]
                    }
                ],
                "errors": {},
                "duration": 0.061
            }


### GET

## Retrieve a specific Course [/v1/courses/:id]

 Retrieve a specific course.

### GET

+ Parameter
    + id: `1` (required, integer) - To filter by specific course id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/courses/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": [
                    {
                        "id": 1,
                        "name": "Android",
                        "image": "http://localhost:8000/api/v1/courses/image/1",
                        "details": [
                            {
                                "id": 8,
                                "topic": "Layouts",
                                "descriptions": "Explicabo id vitae aut est. Esse corrupti aut dignissimos fugit maiores. Est assumenda maxime eos optio non debitis molestias. Non est corporis praesentium distinctio. Sunt reprehenderit officiis animi quia perspiciatis."
                            },
                            {
                                "id": 8,
                                "topic": "Views",
                                "descriptions": "Explicabo id vitae aut est. Esse corrupti aut dignissimos fugit maiores. Est assumenda maxime eos optio non debitis molestias. Non est corporis praesentium distinctio. Sunt reprehenderit officiis animi quia perspiciatis."
                            }
                        ]
                    }
                ],
                "errors": {},
                "duration": 0.072
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/courses/155",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                  "message": "The resource that match ID: ( 155 ) does not found.",
                  "code": 400001
                },
                "duration": 0.079
            }

## Get an Course Image [/v1/courses/image/:id]

   Retrieve the profile image of a course that correspond to the ID as the last segment of the URL.

   + Parameter
       + id: `7` (required, integer) - A primary key of courses id.


   + Response 200 (image/png)


![course_image](images/2019/08/40845910.png)

## Creates a Course [/v1/courses]

  Creates a course.

### POST
+ Parameters
    + name: `Java Offshore` (required, string).
    + image: `image.png` (required, image).


+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/courses",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "id": 16
                },
                "errors": {},
                "duration": 0.237
            }


+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/courses",
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
                            "attribue": "image",
                            "message": "The image field is required."
                        },
                        {
                            "attribue": "image",
                            "message": "The image must be an image."
                        }
                    ]
                },
                "duration": 0.005
            }

## Updates a Course [/v1/courses/:id]

  Updates a course that correspond to the ID as the last segment of the URL.

  ### PUT

  + Parameter
    + id:`1` (required, string). - To filter by specific course id.
    + name: `Java Offshore` (optional, string).
    + image: `image.png` (optional, image).


  + Response 201 (application/json; charset=utf-8)

      + Body

              {
                  "success": 1,
                  "code": 200,
                  "meta": {
                      "method": "PUT",
                      "endpoint": "api/v1/users/11",
                      "limit": 30,
                      "offset": 0
                  },
                  "data": {
                      "updated": 1
                  },
                  "errors": {},
                  "duration": 0.056
              }


+ Response 400 (application/json; charset=utf-8)

    + Body

                {
                    "success": 0,
                    "code": 400,
                    "meta": {
                        "method": "PUT",
                        "endpoint": "api/v1/courses/1",
                        "limit": 30,
                        "offset": 0
                    },
                    "data": [],
                    "errors": {
                        "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                        "code": 400002,
                        "validation": [
                            {
                                "attribue": "image",
                                "message": "The image must be an image."
                            }
                        ]
                    },
                    "duration": 0.005
                }


## Deletes a Course [/v1/courses/:id]

  Deletes a course that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + id: `7` (required, integer) - A primary key of course id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/courses/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "deleted": 1
                },
                "errors": {},
                "duration": 0.121
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/courses/1333",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The resource that match ID: ( 1333 ) does not found.",
                    "code": 400001
                },
                "duration": 0.019
            }
