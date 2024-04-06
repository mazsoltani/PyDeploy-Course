import os

from fastapi import FastAPI, File, UploadFile
from deepface import DeepFace

app = FastAPI()


@app.post("/")
async def process_image(file: UploadFile = File()):
    if not file.content_type.startswith("image"):
        return {"error": "Only images are allowed"}

    with open(file.filename, "wb") as f:
        f.write(await file.read())
    objs = DeepFace.analyze(
        img_path=file.filename,
        actions=['age'],
        # be ezaye har action yek file bayad doownload beshe ke hajme balaei dare,
        # dar sorate niaz khate bala comment beshe va khate paein uncomment
        # actions=['age', 'gender', 'race', 'emotion']
    )
    os.remove(file.filename)
    return {"message": f"Image processed successfully", "data": objs}
