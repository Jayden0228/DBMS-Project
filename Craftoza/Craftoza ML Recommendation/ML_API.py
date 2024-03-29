import uvicorn
import json
import pickle
from fastapi import FastAPI,Form

app=FastAPI()

class CraftozaRecomML:

       def giveREC(self,pid):
        self.model=pickle.load(open('C:/xampp/htdocs/DBProject/Craftoza/Craftoza ML Recommendation/Model.pkl','rb'))
        self.modelIndices=pickle.load(open('C:/xampp/htdocs/DBProject/Craftoza/Craftoza ML Recommendation/ModelIndices.pkl','rb'))
        self.modelDataSet=pickle.load(open('C:/xampp/htdocs/DBProject/Craftoza/Craftoza ML Recommendation/ModelIndicesDatasetCleaned.pkl','rb'))
        idx=self.modelIndices[pid]
        sig_scores=list(enumerate(self.model[idx]))
        sig_scores=sorted(sig_scores,key=lambda x:x[1],reverse=True)
        sig_scores=sig_scores[1:11]
        indicesX=[i[0] for i in sig_scores]
        l= list(self.modelDataSet['pid'].iloc[indicesX])
        RecommenedResponseDict={'Top10Rec':l}
        RecommenedCraftozaJson=json.dumps(RecommenedResponseDict,indent=10)
        # with open('RecommenedCraftozaJson.json','w') as file:
        #         json.dump(RecommenedCraftozaJson,file)
        return RecommenedCraftozaJson
@app.post('/')
def getRecommendation(pid: str=Form()):
    x=CraftozaRecomML()
    return(x.giveREC(pid))   

if __name__=='__main__':
    uvicorn.run(app,host="localhost",port=8000)

