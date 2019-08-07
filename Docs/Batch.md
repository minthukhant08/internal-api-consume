# Batch Feature
The endpoint controls Batches.


# Retrieve the list of batches [/v1/batches]

### GET

+ Parameters
    + limit : `30` (optional, integer)
    + offset : `0` (optional, integer)


Retrieve the list of batches.

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/batches",
                    "limit": 2,
                    "offset": 0,
                    "total": 12
                },
                "data": [
                    {
                        "id": 12,
                        "name": "asf",
                        "start_date": "1976-11-12",
                        "end_date": "1976-11-12",
                        "courses": [
                            {
                                "id": 7,
                                "name": "Mr. Reese Beer",
                                "image": "http://localhost:8000/api/v1/courses/image/7"
                            },
                            {
                                "id": 3,
                                "name": "Prof. Coy Strosin",
                                "image": "http://localhost:8000/api/v1/courses/image/3"
                            }
                        ]
                    },
                    {
                        "id": 11,
                        "name": "asf",
                        "start_date": "1976-11-12",
                        "end_date": "1976-11-12",
                        "courses": [
                            {
                                "id": 7,
                                "name": "Mr. Reese Beer",
                                "image": "http://localhost:8000/api/v1/courses/image/7"
                            },
                            {
                                "id": 3,
                                "name": "Prof. Coy Strosin",
                                "image": "http://localhost:8000/api/v1/courses/image/3"
                            }
                        ]
                    }
                ],
                "errors": {},
                "duration": 0.013
            }


### GET

## Retrieve a specific Batch [/v1/batches/:id]

 Retrieve a specific batch.

### GET

+ Parameter
    + id: `1` (required, integer) - To filter by specific batch id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/batches/2",
                    "limit": 30,
                    "offset": 0
                },
                "data": [
                      {
                          "id": 2,
                          "name": "Mollie Wunsch",
                          "start_date": "1971-11-15",
                          "end_date": "2002-05-20",
                          "courses": [
                              {
                                  "id": 5,
                                  "name": "Ayana Farrell",
                                  "image": "http://localhost:8000/api/v1/courses/image/5"
                              },
                              {
                                  "id": 4,
                                  "name": "Ian Marvin II",
                                  "image": "http://localhost:8000/api/v1/courses/image/4"
                              }
                          ]
                      }
                ],
                "errors": {},
                "duration": 0.017
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 404,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/batches/24545",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The resource that match ID: ( 24545 ) does not found.",
                    "code": 400001
                },
                "duration": 0.011
            }


## Creates a Batch [/v1/batches]

  Creates a batch.

### POST
+ Parameters
    + name: `Batch 1` (required, string).
    + start_date: `1971-11-15` (required, date).
    + end_date: `1971-11-15` (required, date).
    + course_id: `[2, 3, 5]` (required, array). - list of courses that belongs to batch.


+ Response 201 (application/json; charset=utf-8)

    + Body
            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/batches",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {},
                "duration": 0.329
            }



+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/batches",
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
                              "attribue": "start_date",
                              "message": "The start date field is required."
                          },
                          {
                              "attribue": "start_date",
                              "message": "The start date is not a valid date."
                          }
                          {
                              "attribue": "end_date",
                              "message": "The end date field is required."
                          },
                          {
                              "attribue": "end_date",
                              "message": "The end date is not a valid date."
                          },
                          {
                              "attribue": "course_id",
                              "message": "The course id field is required."
                          },
                          {
                             "attribue": "course_id.0",
                             "message": "The selected course_id.0 is invalid."
                         },
                         {
                             "attribue": "course_id.1",
                             "message": "The selected course_id.1 is invalid."
                         }
                    ]
                },
                "duration": 0.388
            }

## Updates a Batch [/v1/batches/:id]

  Updates a batch that correspond to the ID as the last segment of the URL.

  ### PUT

  + Parameter
    + id:`1` (required, string). - To filter by specific batch id.
    + name: `Batch 1` (optional, string).
    + start_date: `1971-11-15` (optional, date).
    + end_date: `1971-11-15` (optional, date).
    + course_id: `[2, 3, 5]` (optional, array). - list of courses that belongs to batch.


  + Response 201 (application/json; charset=utf-8)

      + Body

              {
                  "success": 1,
                  "code": 200,
                  "meta": {
                      "method": "PUT",
                      "endpoint": "api/v1/batches/2",
                      "limit": 30,
                      "offset": 0
                  },
                  "data": {
                    "updated": 1
                  },
                  "errors": {},
                  "duration": 0.028
              }


+ Response 400 (application/json; charset=utf-8)

    + Body

            {
                "success": 0,
                "code": 400,
                "meta": {
                    "method": "PUT",
                    "endpoint": "api/v1/batches/2",
                    "limit": 30,
                    "offset": 0
                },
                "data": [],
                "errors": {
                    "message": "The request parameters are incorrect, please make sure to follow the documentation.",
                    "code": 400002,
                    "validation": [
                          {
                              "attribue": "start_date",
                              "message": "The start date is not a valid date."
                          },
                          {
                              "attribue": "end_date",
                              "message": "The end date is not a valid date."
                          },
                          {
                              "attribue": "course_id",
                              "message": "The selected course id is invalid."
                          }
                    ]
                },
                "duration": 0.028
            }


## Deletes a Batch [/v1/batches/:id]

  Deletes a batch that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + id: `1` (required, integer) - A primary key of batch id.


+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "DELETE",
                    "endpoint": "api/v1/batches/1",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "deleted": 1
                },
                "errors": {},
                "duration": 0.095
            }

+ Response 404 (application/json; charset=utf-8)

    + Body

          {
              "success": 0,
              "code": 404,
              "meta": {
                  "method": "DELETE",
                  "endpoint": "api/v1/batches/1333",
                  "limit": 30,
                  "offset": 0
              },
              "data": [],
              "errors": {
                  "message": "The resource that match ID: ( 1333 ) does not found.",
                  "code": 400001
              },
              "duration": 0.047
          }
