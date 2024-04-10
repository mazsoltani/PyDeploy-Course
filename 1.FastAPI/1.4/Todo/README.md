# FastAPI Task Manager

This project is a simple task management application built with FastAPI and SQLAlchemy. It provides APIs to create, read, update, and delete tasks.

## Features

- Create tasks
- Retrieve all tasks
- Retrieve a single task by ID
- Update tasks
- Delete tasks

## Installation

Ensure you have Python 3.8+ installed on your system.

1. Clone this repository:
   ```bash
   git clone <repository-url>
   cd <project-directory>

# Install the requirements:
pip install -r requirements.txt


# Running the Application
uvicorn main:app --reload


# API Endpoints
The following endpoints are available:

POST /tasks/: Create a new task.
Payload: {"title": "Task Title", "description": "Task Description"}
GET /tasks/: Retrieve all tasks.
GET /task/{task_id}: Retrieve a task by its ID.
PUT /task/{task_id}: Update a task.
Payload: {"title": "New Task Title", "description": "New Task Description"}
DELETE /task/{task_id}: Delete a task.
