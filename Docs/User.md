# User Feature
The endpoint controls user resource.-


# Retrieve the list of user [/v1/users]

### GET

+ Parameters
    + limit : `30` (optional, integer)
    + offset : `0` (optional, integer)
    + user_type : `student` (optional, string) - To filter by user type.
    + name: `John` (optional, string) - To filter by name.
    + gender: `male` (optional, string) - To filter by user gender.
    + course: `PHP` (optional, string) - To filter by course name.
    + batch: `1` (optional, string) - To filter by batch name.


Retrieve the list of users.

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 200,
                "meta": {
                    "method": "GET",
                    "endpoint": "api/v1/users",
                    "limit": 30,
                    "offset": 0,
                    "total": 11
                },
                "data": [
                      {
                        "id": 1,
                        "name": "Hailie Walsh II",
                        "email": "heathcote.thora@example.com",
                        "gender": "male",
                        "date_of_birth": "2015-12-22",
                        "nrc_no": "1/MaMaNa(N)764535",
                        "phone_no": "+951692856742",
                        "address": "1205 Halvorson View\nNew Ryley, OK 69676",
                        "image": "http://talent.com/api/v1/users/image/1",
                        "grade": "B",
                        "company": null,
                        "job": null,
                        "user_type": "student",
                        "course": {
                            "id": 4,
                            "name": "PHP"
                        },
                        "batch": {
                            "id": 2,
                            "name": "version 1"
                        }
                    },
                    {
                      "id": 2,
                      "name": "Hailie ",
                      "email": "thora@example.com",
                      "gender": "female",
                      "date_of_birth": "2010-12-8",
                      "nrc_no": "12/BaMaNa(N)762345",
                      "phone_no": "+95634446789",
                      "address": "1205 Halvorson View\nNew Ryley, OK 69676",
                      "image": "http://talent.com/api/v1/users/image/1",
                      "grade": null,
                      "company": "ACE Plus",
                      "job": "Heating and Air Conditioning Mechanic",
                      "user_type": "teacher",
                      "course": {
                          "id": 4,
                          "name": "PHP"
                      },
                      "batch": {
                          "id": 2,
                          "name": "version 1"
                      }
                  }
                ],
                "errors": {},
                "duration": 1.006
            }


### GET

## Retrieve a specific User [/v1/users/:id]

 Retrieve a specific user.

### GET

+ Parameter
    + id: `1` (required, integer) - To filter by specific user id.


+ Response 200 (application/json; charset=utf-8)

    + Body

          {
              "success": 1,
              "code": 201,
              "meta": {
              "method": "GET",
              "endpoint": "api/v1/users/1",
              "limit": 30,
              "offset": 0
              },
              "data": [
                    {
                      "id": 1,
                      "name": "Hailie Walsh II",
                      "email": "heathcote.thora@example.com",
                      "gender": "male"
                      "date_of_birth": "2015-12-22",
                      "nrc_no": "1/MaMaNa(N)764535",
                      "phone_no": "+951692856742",
                      "address": "1205 Halvorson View\nNew Ryley, OK 69676",
                      "image": "http://talent.com/api/v1/users/image/1",
                      "grade": "B",
                      "company": null,
                      "job": null,
                      "user_type": "student",
                      "course": {
                          "id": 4,
                          "name": "PHP"
                      },
                      "batch": {
                          "id": 2,
                          "name": "version 1"
                      }
                  }
              ],
              "errors": {},
              "duration": 0.081
        }

+ Response 404 (application/json; charset=utf-8)

    + Body

          {
              "success": 0,
              "code": 404,
              "meta": {
                "method": "GET",
                "endpoint": "api/v1/users/55",
                "limit": 30,
                "offset": 0
              },
              "data": [],
              "errors": {
                "message": "The resource that match ID: ( 55 ) does not found.",
                "code": 400001
              },
              "duration": 0.088
          }

## Get an User Image [/v1/users/image/:id]

   Retrieve the profile image of an user that correspond to the ID as the last segment of the URL.

   + Parameter
       + id: `7` (required, integer) - A primary key of user id.


   + Response 200 (image/png)


![user_profile](images/2019/08/40845910.png)

## Login [/v1/users/login]
  Login into API using email and password.

### POST
+ Parameters
    + email: `example@mail.com` (required, string).
    + password: `dsf12@3434` (required, string).


+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/users/login",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "user": {
                        "id": 20,
                        "name": "Min Thu",
                        "email": "mtk@gmail.com",
                        "gender": "male",
                        "date_of_birth": "1976-11-12",
                        "nrc_no": "sdfDsdf",
                        "phone_no": "094345675",
                        "address": "sdfasdf asdf asdf a ad fa",
                        "image": "http://localhost:8000/api/v1/users/image/20",
                        "grade": null,
                        "company": null,
                        "job": null,
                        "user_type": "student",
                        "course": null,
                        "batch": null
                    },
                    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvdXNlcnNcL2xvZ2luIiwiaWF0IjoxNTY0NzU1OTMwLCJleHAiOjE1NjQ3NTk1MzAsIm5iZiI6MTU2NDc1NTkzMCwianRpIjoiVUtmRTdQY3Vsa3BRRk04bCIsInN1YiI6MjAsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.y6il88Ys6-y8yzTpiKrk4Nh7hNsGaWGh8XVQbLTapJQ"
                },
                "errors": {},
                "duration": 0.152
            }


+ Response 401 (application/json; charset=utf-8)

    + Body
          {
              "success": 0,
              "code": 401,
              "meta": {
                  "method": "POST",
                  "endpoint": "api/v1/users/login",
                  "limit": 30,
                  "offset": 0
              },
              "data": [],
              "errors": {
                  "message": "Access Denied. Please check your credentials",
                  "code": 400001
              },
              "duration": 0.068
          }


## Creates a User [/v1/users]

  Creates a user.

### POST
+ Parameters
    + name: `Min Thu Khant` (required, string).
    + email: `example@mail.com` (required, unique, string).
    + password: `dsf12@3434` (required, string).
    + gender: `male` (required, string).
    + date_of_birth: `2015-12-22` (required, date).
    + phone_no: `+092345456` (required, string).
    + nrc_no: `1/MaMaNa(Ng)098765` (required, string).
    + address: `No.1, Mingalardon, Yangon` (required, string)
    + user_type: `student` (required, string).
    + job: `developer` (optional, string).
    + company: `Ace` (optional, string).
    + grade: `A` (optional, string).
    + course_id: `1` (optional, integer).
    + batch_id: `1` (optional, integer).
    + image: `image.png` (required, image).


+ Response 201 (application/json; charset=utf-8)

    + Body

            {
                "success": 1,
                "code": 201,
                "meta": {
                    "method": "POST",
                    "endpoint": "api/v1/users",
                    "limit": 30,
                    "offset": 0
                },
                "data": {
                    "id": 22,
                    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvdXNlcnMiLCJpYXQiOjE1NjQ3NTYwNTUsImV4cCI6MTU2NDc1OTY1NSwibmJmIjoxNTY0NzU2MDU1LCJqdGkiOiJXOGs1S25vakd4dVZ5b09PIiwic3ViIjoyMiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.iGq_qWnVzfGopPq3rtWV6d7DdRaYg6Mt6R4Fj8xbmjY"
                },
                "errors": {},
                "duration": 0.274
            }

+ Response 400 (application/json; charset=utf-8)

    + Body

          {
              "success": 0,
              "code": 400,
              "meta": {
                  "method": "POST",
                  "endpoint": "api/v1/users",
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
                          "attribue": "email",
                          "message": "The email field is required."
                      },
                      {
                          "attribue": "email",
                          "message": "The email must be a valid email address."
                      },
                      {
                          "attribue": "email",
                          "message": "The email has already been taken."
                      },
                      {
                          "attribue": "password",
                          "message": "The password field is required."
                      },
                      {
                          "attribue": "gender",
                          "message": "The gender field is required."
                      },
                      {
                          "attribue": "date_of_birth",
                          "message": "The date of birth field is required."
                      },
                      {
                          "attribue": "date_of_birth",
                          "message": "The date of birth is not a valid date."
                      },
                      {
                          "attribue": "phone_no",
                          "message": "The phone no field is required."
                      },
                      {
                          "attribue": "nrc_no",
                          "message": "The nrc no field is required."
                      },
                      {
                          "attribue": "address",
                          "message": "The address field is required."
                      },
                      {
                          "attribue": "user_type",
                          "message": "The user type field is required."
                      },
                      {
                          "attribue": "image",
                          "message": "The image field is required."
                      }
                      {
                          "attribue": "image",
                          "message": "The image must be an image."
                      }
                  ]
              },
              "duration": 0.047
          }

## Updates a User [/v1/users/:id]

  Updates a user that correspond to the ID as the last segment of the URL.

  ### PUT

  + Parameters
      + id: `1` (required, string). - To filter by specific user id.
      + name: `Min Thu Khant` (optional, string).
      + email: `example@mail.com` (optional, unique, email, string).
      + password: `dsf12@3434` (optional, string).
      + gender: `male` (optional, string).
      + date_of_birth: `2015-12-22` (optional, date).
      + phone_no: `+092345456` (optional, string).
      + nrc_no: `1/MaMaNa(Ng)098765` (optional, string).
      + address: `No.1, Mingalardon, Yangon` (optional, string)
      + user_type: `student` (optional, string).
      + job: `developer` (optional, string).
      + company: `Ace` (optional, string).
      + grade: `A` (optional, string).
      + course_id: `1` (optional, integer).
      + batch_id: `1` (optional, integer).
      + image: `image file` (optional, image).



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
              "endpoint": "api/v1/users/1",
              "limit": 30,
              "offset": 0
              },
              "data": [],
              "errors": {
              "message": "The request parameters are incorrect, please make sure to follow the documentation.",
              "code": 400002,
              "validation": [
                  {
                      "attribue": "email",
                      "message": "The email must be a valid email address."
                  },
                  {
                      "attribue": "email",
                      "message": "The email has already been taken."
                  },
                  {
                      "attribue": "date_of_birth",
                      "message": "The date of birth is not a valid date."
                  },
                  {
                      "attribue": "image",
                      "message": "The image must be an image."
                  }
              ]
              },
              "duration": 0.102
          }


## Deletes a User [/v1/users/:id]

  Deletes a user that correspond to the ID as the last segment of the URL.

### DELETE

+ Parameter
    + user_id: `7` (required, integer) - A primary key of user id.


+ Response 200 (application/json; charset=utf-8)

    + Body

          {
              "success": 1,
              "code": 200,
              "meta": {
                  "method": "DELETE",
                  "endpoint": "api/v1/users/1",
                  "limit": 30,
                  "offset": 0
              },
              "data": {
                  "deleted": 1
              },
              "errors": {},
              "duration": 0.066
          }

+ Response 404 (application/json; charset=utf-8)

    + Body

          {
              "success": 0,
              "code": 404,
              "meta": {
                  "method": "DELETE",
                  "endpoint": "api/v1/users/1777",
                  "limit": 30,
                  "offset": 0
              },
              "data": [],
              "errors": {
                  "message": "The resource that match ID: ( 1777 ) does not found.",
                  "code": 400001
              },
              "duration": 0.058
          }
