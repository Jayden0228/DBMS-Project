import uvicorn
import json
import pickle
from fastapi import FastAPI

app=FastAPI()

class CraftozaRecomML:
      
       def giveREC(self,pid):
        self.model=pickle.load(open('Model.pkl','rb'))
        self.modelIndices=pickle.load(open('ModelIndices.pkl','rb'))
        self.modelDataSet=pickle.load(open('ModelIndicesDatasetCleaned.pkl','rb'))
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
@app.get('/')
def getRecommendation(pid: str):
    x=CraftozaRecomML()
    return(x.giveREC(pid))   

if __name__=='__main__':
    uvicorn.run(app,host="localhost",port=8000) 