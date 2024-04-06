import requests
import os
from dotenv import load_dotenv 

load_dotenv()  
API_KEY = os.getenv("API_KEY")

url = "https://api.iconfinder.com/v4/categories/arrow/iconsets?count=15"

headers = {
    "accept": "application/json",
    'Authorization': f"Bearer {API_KEY}", 
}

response = requests.get(url, headers=headers)

print(response.text)