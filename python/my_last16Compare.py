from pymongo import MongoClient
from dateutil.parser import parse
import datetime
import json
from datetime import date, timedelta
conn=MongoClient('mongodb://admin:admin@cluster0-shard-00-00-9eks9.mongodb.net:27017,cluster0-shard-00-01-9eks9.mongodb.net:27017,cluster0-shard-00-02-9eks9.mongodb.net:27017/test?ssl=true&replicaSet=Cluster0-shard-0&authSource=admin&retryWrites=true')
predict = conn.fyp.predictData
actual = conn.fyp.currentAQHI
result = predict.find().sort("dateTime",-1).limit(16)
reJson = {}
for a in result: 
    loca = a['location']
    preAqhi = a['paqhi']
    fmt = a['dateTime'].strftime('%Y-%m-%d %H')
    reJson[loca]=[]
    time = parse(fmt)+ timedelta(hours=0.5)
    result2 = actual.find_one({"time":{"$eq":time},"locationCode":a['locationCode']})
    if result2 != None:
        actAqhi = result2['aqhi']
    else:
        actAqhi = '3'
    reJson[loca]={actAqhi,preAqhi}
print(reJson)

