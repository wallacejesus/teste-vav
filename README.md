# teste-vav
Teste para processo seletivo da VAV Audio Visual

Para o endpoint foi criado gerado o arquivo (vav_endpoint.json), que poderá ser utilizado com programa postman que pode ser baixado no link https://www.getpostman.com/downloads/. 

Para utilizar o endpoint, após ter baixado o programa postman, basta importar o arquivo (vav_endpoint.json).

# URL da API
  
  
  *http://wjapps.tk/vav/api/*

# Ações Criadas

 *1 - Criar Pessoa (http://wjapps.tk/vav/api/pessoa/create)*
 
    1.1 - Esta ação foi criada para executada via [POST] usando os parâmetros abaixo:
    
      [HEADER]
        key="Content-Type", value="application/json"
        
      [BODY]
        {
          "nome":string,
          "sobrenome":string,
          "dt_aniversario":date,
          "telefones":[
            {
              "numero":string,
              "tipo":string
            },
            {
              "numero":string,
              "tipo":string
            }
           ]
        }
*2 - Atualizar Pessoa (http://wjapps.tk/vav/api/pessoa/update/:id_pessoa )* :id_pessoa<string>

    2.1 - Esta ação foi criada para executada via [PUT] usando os parâmetros abaixo:
    
      [HEADER]
        key="Content-Type", value="application/json"
        
      [BODY]
        {
          "nome":string,
          "sobrenome":string,
          "dt_aniversario":date,
          "telefones":[
            {
              "numero":string,
              "tipo":string
            },
            {
              "numero":string,
              "tipo":string
            }
           ]
        }    

*3 - Listar Pessoas (http://wjapps.tk/vav/api/pessoa/findAll)*

    3.1 - Esta ação foi criada para executada via [GET]
    

*4 - Listar por nome (http://wjapps.tk/vav/api/pessoa/findOne/:nome)* :nome<string>

    4.1 - Esta ação foi criada para executada via [GET]    
    

*5 - Deletar Pessoas (http://wjapps.tk/vav/api/pessoa/delete/:id_pessoa)* :id_pessoa<string>

    5.1 - Esta ação foi criada para executada via [DELETE]        
