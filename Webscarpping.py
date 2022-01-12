import sys
import mysql.connector
import requests
from bs4 import BeautifulSoup
import re
import json

# Webscarpping
terms = sys.argv[2]
response = requests.get(
    f"https://www.youtube.com/results?search_query={terms}").text

soup = BeautifulSoup(response, 'lxml')

script = soup.find_all("script")[32]

json_text = re.search('var ytInitialData = (.+)[,;]{1}', str(script)).group(1)

json_data = json.loads(json_text)

content = (
    json_data['contents']['twoColumnSearchResultsRenderer']
    ['primaryContents']['sectionListRenderer']
    ['contents'][0]['itemSectionRenderer']
    ['contents']
)
i = 0
for data in content:
    for key, value in data.items():
        if type(value) is dict:
            for k, v in value.items():
                if k == "videoId" and len(v) == 11:
                    Id = v
                    i = i+1
                if k == "thumbnail" and "thumbnails" in v:
                    pic = v["thumbnails"][0]["url"]+'\n'
    if(i > 2):
        break

# connecting to the database
dataBase = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="pyproject")


# preparing a cursor object
cursorObject = dataBase.cursor()

# selecting query
query = "UPDATE projects SET Videolink = %s WHERE Pyid = %s"
val = ("https://www.youtube.com/watch?v="+Id, sys.argv[1])

cursorObject.execute(query, val)
dataBase.commit()

# disconnecting from server
dataBase.close()
