from datetime import datetime
from pydantic import BaseModel, Field


class TaskCreate(BaseModel):
    title: str
    description: str
    time: datetime


class TaskGet(TaskCreate):
    status: bool = Field()
