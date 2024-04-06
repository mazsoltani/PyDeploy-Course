import requests
import dotenv
import os

dotenv.load_dotenv()

API_KEY = os.getenv("API_KEY")

url = "https://api.d-id.com/clips"

payload = {
    "script": {
        "type": "text",
        "provider": {
            "type": "microsoft",
            "voice_id": "rian-lZC6MmWfC1"
        },
        "ssml": "false",
        "input": "Hi every body. khaste nabashid. hahahahahhahah"
    },
    "config": { "result_format": "mp4" },
    "presenter_config": { "crop": { "type": "wide" } },
    "background": { "color": "false" },
    "presenter_id": "anita-6_uTzyZtNR"
}
headers = {
    "accept": "application/json",
    "content-type": "application/json",
    "authorization": "Bearer " + API_KEY
}

response = requests.post(url, json=payload, headers=headers)

print(response.status_code)
print(response.json())