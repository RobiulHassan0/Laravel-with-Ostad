# 📘 API Documentation — API-C03

## 1. Overview

**API-C03** is a RESTful backend API built with **Laravel**, designed to support authentication and core application features such as task management.

The API uses **Laravel Sanctum** for secure, token-based authentication and communicates exclusively using **JSON**.

This documentation describes the available endpoints, authentication mechanism, request requirements, and usage guidelines.

---

## 2. Base URL

```
http://127.0.0.1:8000/api
```

All endpoints are versioned under:

```
/v1
```

---

## 3. Authentication

### Authentication Method

* **Laravel Sanctum**
* Token-based authentication

### Required Headers (for protected routes)

```
Authorization: Bearer {access_token}
Accept: application/json
Content-Type: application/json
```

> ⚠️ Any request to protected endpoints without a valid Bearer token will be rejected with an authentication error.

---

## 4. Authentication Module (Auth)

### 4.1 Register User

**Endpoint**

```
POST /v1/register
```

**Description**
Registers a new user and creates an account.

**Request Body**

```json
{
  "name": "Hassan",
  "email": "hassan@mail.com",
  "password": "robin5"
}
```

**Response**

* User created successfully
* Authentication token may be returned (based on implementation)

---

### 4.2 Login User

**Endpoint**

```
POST /v1/login
```

**Description**
Authenticates a user and returns an access token.

**Request Body**

```json
{
  "email": "robin@mail.com",
  "password": "123456"
}
```

**Response**

```json
{
  "access_token": "12|xxxxxxxxxxxxxxxx",
  "token_type": "Bearer"
}
```

---

### 4.3 Logout User (Protected)

**Endpoint**

```
POST /v1/logout
```

**Authentication Required** ✅

**Description**
Revokes the currently active access token.

**Headers**

```
Authorization: Bearer {access_token}
Accept: application/json
```

**Response**

```json
{
  "message": "Logged out successfully"
}
```

---

### 4.4 User Profile (Protected)

**Endpoint**

```
POST /v1/profile
```

**Authentication Required** ✅

**Description**
Returns authenticated user profile information.

**Headers**

```
Authorization: Bearer {access_token}
Accept: application/json
```

---

## 5. Task Management Module

All task-related endpoints are **protected** and require authentication.

---

### 5.1 Create Task

**Endpoint**

```
POST /v1/store
```

**Authentication Required** ✅

**Description**
Creates a new task.

**Headers**

```
Authorization: Bearer {access_token}
Accept: application/json
Content-Type: application/json
```

**Request Body**

```json
{
  "title": "Task Title",
  "description": "Task description"
}
```

---

### 5.2 Get All Tasks

**Endpoint**

```
GET /v1/index
```

**Authentication Required** ✅

**Description**
Retrieves all tasks associated with the authenticated user.

**Headers**

```
Authorization: Bearer {access_token}
Accept: application/json
```

---

### 5.3 Get Task by ID

**Endpoint**

```
GET /v1/task/edit/{id}
```

**Authentication Required** ✅

**Description**
Retrieves a single task by its unique ID.

**Example**

```
GET /v1/task/edit/27
```

---

### 5.4 Delete Task

**Endpoint**

```
DELETE /v1/task/delete/{id}
```

**Authentication Required** ✅

**Description**
Deletes a task by ID.

**Example**

```
DELETE /v1/task/delete/27
```

---

## 6. Error Handling

All errors are returned in JSON format with appropriate HTTP status codes.

### Example (Unauthorized)

```json
{
  "message": "Unauthenticated."
}
```

### Example (Validation Error)

```json
{
  "message": "Validation failed",
  "errors": {
    "title": ["The title field is required."]
  }
}
```

---

## 7. Notes & Best Practices

* Always store the **access token** securely on the client side.
* Use **Postman Environment Variables** for:

  * `BASEURL`
  * `access_token`
* Tokens stored in `personal_access_tokens` table are **hashed** and cannot be reused manually.

---

## 8. Conclusion

This API provides a secure and scalable foundation for authentication and task management using modern Laravel best practices.

For testing and development, refer to the provided **Postman Collection (API-C03)** as the single source of truth.


