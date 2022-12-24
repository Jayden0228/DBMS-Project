import pandas as pd
import numpy as np
import json
import pickle

class CraftozaRecomML:
      
       def Craftoza_pleaseRecommend(self,pid):
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
        with open('RecommenedCraftozaJson.json','w') as file:
                json.dump(RecommenedCraftozaJson,file)
        return RecommenedCraftozaJson
        

x=CraftozaRecomML()
print(x.Craftoza_pleaseRecommend("CRAF-6-C#2"))




