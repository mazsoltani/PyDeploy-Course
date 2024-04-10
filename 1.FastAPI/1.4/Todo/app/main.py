from fastapi import FastAPI, Depends, HTTPException
from sqlalchemy.orm import Session
from starlette import status

from database import SessionLocal, engine
import crud, models, schemas

app = FastAPI()

models.Base.metadata.create_all(bind=engine)


# Dependency
def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()


@app.post("/tasks/", response_model=schemas.TaskGet)
def create_task(task: schemas.TaskCreate, db: Session = Depends(get_db)):
    return crud.create_task(db=db, task=task)


@app.get("/tasks/", response_model=list[schemas.TaskGet])
def read_tasks(db: Session = Depends(get_db)):
    tasks = crud.get_tasks(db)
    return tasks


@app.get("/task/{task_id}", response_model=schemas.TaskGet)
def read_task(task_id: int, db: Session = Depends(get_db)):
    return crud.get_task(db, task_id)


@app.put("/task/{task_id}", response_model=schemas.TaskGet)
def update_task(task: schemas.TaskGet, task_id: int, db: Session = Depends(get_db)):
    db_task = db.get(models.Task, task_id)
    if not db_task:
        raise HTTPException(status_code=404, detail="task not found")
    return crud.update_task(db, task, task_id)


@app.delete("/task/{task_id}", status_code=status.HTTP_204_NO_CONTENT)
def delete_task(task_id: int, db: Session = Depends(get_db)):
    deleted = crud.delete_task(db, task_id)
    if deleted:
        return None
    raise HTTPException(status_code=404, detail="task not found")
