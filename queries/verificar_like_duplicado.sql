


SELECT count(*) as qtdLike FROM 
     
         tblike as l 
         
            inner join 

         tbusuario as u on l.lik_fk_usu = u.usu_pk_id
		 
             inner join 

         tbpost as p on l.lik_fk_post = p.pst_pk_id 
         
		
           
		where u.usu_pk_id = 1 and  p.pst_pk_id = 1 
