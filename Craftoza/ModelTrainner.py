import pandas as pd
import numpy as np
import json
import pickle

CraftozaDataset=pd.read_csv("product.csv")
CraftozaDatasetCLEANED=CraftozaDataset.drop(columns=['sid','qnt','rating','discnt','credit','material','type','spec','ParentImgLink','price'])
from sklearn.feature_extraction.text import TfidfVectorizer
tfv=TfidfVectorizer(min_df=3,max_features=None,strip_accents='unicode',analyzer='word',token_pattern=r'\w{1,}',ngram_range=(1,3),stop_words='english')
CraftozaDatasetCLEANED['des']=CraftozaDatasetCLEANED['des'].fillna('')
tfv_matrix=tfv.fit_transform(CraftozaDatasetCLEANED['des'])
from sklearn.metrics.pairwise import sigmoid_kernel
sig=sigmoid_kernel(tfv_matrix,tfv_matrix)
indices=pd.Series(CraftozaDatasetCLEANED.index,index=CraftozaDatasetCLEANED['pid'].drop_duplicates())

name='CRAFTOZAmlSIG'
outfile=open(name,'wb')
pickle.dump(name,outfile)
outfile.close()

name='CRAFTOZAmlIndices'
outfile=open(name,'wb')
pickle.dump(name,outfile)
outfile.close()
 

    






