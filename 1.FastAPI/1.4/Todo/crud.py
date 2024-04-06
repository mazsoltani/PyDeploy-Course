from fastapi import HTTPException
from sqlalchemy.orm import Session
import models, schemas


# def get_task(db: Session, task_id: int):
#     return db.query(models.Task).filter(models.Task.id == task_id).first()


def get_tasks(db: Session):
    tasks = db.query(models.Task).all()
    task_models = [
        schemas.TaskGet(
            title=task.title,
            description=task.description,
            time=task.time,
            status=task.status
        ) for task in tasks
    ]
    return task_models


def get_task(db: Session, task_id):
    db_task = db.get(models.Task, task_id)
    if not db_task:
        raise HTTPException(status_code=404, detail="task not found")
    task_model = schemas.TaskGet(
        title=db_task.title,
        description=db_task.description,
        time=db_task.time,
        status=db_task.status
    )
    return task_model


def create_task(db: Session, task: schemas.TaskCreate):
    db_task = models.Task(
        title=task.title,
        description=task.description,
        time=task.time,
        status=False
    )
    db.add(db_task)
    db.commit()
    db.refresh(db_task)
    task_model = schemas.TaskCreate(
        title=db_task.title,
        description=db_task.description,
        time=db_task.time,
    )
    return task_model


def update_task(db: Session, task: schemas.TaskGet, task_id):
    db_task = db.query(models.Task).filter(models.Task.id == task_id).first()
    db_task.title = task.title
    db_task.description = task.description
    db_task.time = task.time
    db_task.status = task.status
    db.commit()
    db.refresh(db_task)
    task_model = schemas.TaskGet(
        title=db_task.title,
        description=db_task.description,
        time=db_task.time,
        status=db_task.status
    )
    return task_model


def delete_task(db: Session, task_id):
    result = db.query(models.Task).filter(models.Task.id == task_id).delete()
    db.commit()
    return result
