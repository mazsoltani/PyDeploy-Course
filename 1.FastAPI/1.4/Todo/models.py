from sqlalchemy import Boolean, Column, DateTime, Integer, String

from database import Base


class Task(Base):
    __tablename__ = "tasks"

    id = Column(Integer, primary_key=True)
    title = Column(String)
    description = Column(String)
    time = Column(DateTime(timezone=True))
    status = Column(Boolean, default=False)
