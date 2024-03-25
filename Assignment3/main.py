import requests
import io
import cv2
import numpy as np
from typing import Union
from fastapi import FastAPI, HTTPException, status
from fastapi.responses import FileResponse, StreamingResponse
from fastapi.responses import JSONResponse


app = FastAPI()

@app.get("/")
def intro():
    return {"message": "Hi! Welcome to my API. The Solar System API provides information for thousands of all solar system planets and their moons."}


@app.get("/planets")
def planets():
    return {
    "sun": {
        "distanceFromSun": 0,
        "radius": 695508000,
        "didYouKnow": "The color of the Sun in space is actually mostly white, not yellow or orange. The reason it appears yellow or orange on Earth is due to atmospheric scattering, especially when it is low in the sky."
    },

    "Mercury": {
        "distanceFromSun": 57900000000,
        "radius": 2439000,
        "didYouKnow": "Mercury is actually smaller than some moons of our solar system including Ganymede of Jupiter and Titan of Saturn.",
    },
    "Venus": {
        "distanceFromSun": 108200000000,
        "radius": 6051000,
        "didYouKnow": "While having the second hottest surface temperature in the solar system after The Sun, which is 450C (842F), its atmosphere is so dense that it actually crushes CO2 at the surface and turns it into an exotic material called \"super critical fluid\" which is neither a gas or a liquid but has properties of both. Humans could never live on the surface of Venus but some have proposed living <a href=\"http://www.bbc.com/future/story/20161019-the-amazing-cloud-cities-we-could-build-on-venus\" target=\"_blank\">up in the clouds.</a>"
    },
    "Earth": {
        "distanceFromSun": 149600000000,
        "radius": 6371000,
        "didYouKnow": "Earth's first line of defense against harmful radiation from The Sun is its magnetosphere which extends much further out than the atmosphere. However, the magnetosphere is not perfectly round. On the north and south poles it plunges back down to the Earth making a funnel shape. Occasionally charged particles from The Sun will get trapped in the funnel and fall down to Earth and interact with our atmosphere. This is what causes the visual phenomenon called an         <a href =\"https://en.wikipedia.org/wiki/Aurora\" target =\"_blank\">aurora</a> or northern lights.",
        },
      "moons": {
                "radius": 1738000,
                "distanceFromPlanet": 384400000,
            },
    "Mars": {
        "distanceFromSun": 100000000,
        "radius": 600000,
        "didYouKnow": "While having the second hottest surface temperature in the solar system after The Sun, which is 450C (842F), its atmosphere is so dense that it actually crushes CO2 at the surface and turns it into an exotic material called \"super critical fluid\" which is neither a gas or a liquid but has properties of both. Humans could never live on the surface of Venus but some have proposed living <a href=\"http://www.bbc.com/future/story/20161019-the-amazing-cloud-cities-we-could-build-on-venus\" target=\"_blank\">up in the clouds.</a>"
 
    }
    }


@app.get("/planets/{planet_name}")
def get_planet(planet_name: str):
    planets = {
        "sun": {
            "Planet": "Sun",
            "distanceFromSun": 0,
            "radius": 695508000,
            "didYouKnow": "The color of the Sun in space is actually mostly white, not yellow or orange. The reason it appears yellow or orange on Earth is due to atmospheric scattering, especially when it is low in the sky.",
        },
        "mercury": {
            "Planet": "Mercury",
            "distanceFromSun": 57900000000,
            "radius": 2439000,
            "didYouKnow": "Mercury is actually smaller than some moons of our solar system including Ganymede of Jupiter and Titan of Saturn.",

        },
         "venus": {
        "Planet": "Venus",
        "distanceFromSun": 108200000000,
        "radius": 6051000,
        "didYouKnow": "While having the second hottest surface temperature in the solar system after The Sun, which is 450C (842F), its atmosphere is so dense that it actually crushes CO2 at the surface and turns it into an exotic material called \"super critical fluid\" which is neither a gas or a liquid but has properties of both. Humans could never live on the surface of Venus but some have proposed living <a href=\"http://www.bbc.com/future/story/20161019-the-amazing-cloud-cities-we-could-build-on-venus\" target=\"_blank\">up in the clouds.</a>",

    },
    "earth": {
        "Planet": "Earth",
        "distanceFromSun": 149600000000,
        "radius": 6371000,
        "didYouKnow": "Earth's first line of defense against harmful radiation from The Sun is its magnetosphere which extends much further out than the atmosphere. However, the magnetosphere is not perfectly round. On the north and south poles it plunges back down to the Earth making a funnel shape. Occasionally charged particles from The Sun will get trapped in the funnel and fall down to Earth and interact with our atmosphere. This is what causes the visual phenomenon called an         <a href =\"https://en.wikipedia.org/wiki/Aurora\" target =\"_blank\">aurora</a> or northern lights.",

    },
    "moon": {
        "Planet": "Moon",
        "radius": 1738000,
        "distanceFromPlanet": 384400000,

            },
    "mars": {
        "Planet": "Mars",
        "distanceFromSun": 100000000,
        "radius": 600000,
        "didYouKnow": "While having the second hottest surface temperature in the solar system after The Sun, which is 450C (842F), its atmosphere is so dense that it actually crushes CO2 at the surface and turns it into an exotic material called \"super critical fluid\" which is neither a gas or a liquid but has properties of both. Humans could never live on the surface of Venus but some have proposed living <a href=\"http://www.bbc.com/future/story/20161019-the-amazing-cloud-cities-we-could-build-on-venus\" target=\"_blank\">up in the clouds.</a>",

    }}

    planet_name = planet_name.lower()  # Convert to lowercase 
    if planet_name in planets:
        return planets[planet_name]
    else:
        return {"error": "Planet not found"}
    
       

@app.get("/planets/{planet_name}/image")
def get_planet_image(planet_name: str):

    planets = {
        "sun": {
            "Planet": "Sun",
            "imageUrl": "Images/sun.jpg"
        },
        "mercury": {
            "Planet": "Mercury",
            "imageUrl": "Images/mercury.jpg"

        },
         "venus": {
        "Planet": "Venus",
        "imageUrl": "Images/venus.jpg"

    },
    "earth": {
        "Planet": "Earth",
        "imageUrl": "Images/earth.jpg"

    },
    "moon": {
        "Planet": "Moon",
        "imageUrl": "Images/moon.jpg"

            },
    "mars": {
        "Planet": "Mars",
        "imageUrl": "Images/mars.jpg"
       }}
        
    planet_name = planet_name.lower() 
    if planet_name in planets:
        image_path = planets[planet_name]["imageUrl"]
        return FileResponse(image_path)
    else:
        raise HTTPException(status_code=404, detail="Planet image not found")
      

