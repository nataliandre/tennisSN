			    <div class="form-padding form-share">
				    <form id="js__subscribe__form" action="http://4businessmind.com/ajax/download?token={$token}" method="post">
				    <h2 class="theme-color letters-lg">Подпишись на рассылку новостей</h2>
				    <div class="row">				     
					<div class="col-md-4">
					<input placeholder="E-mail"  type="text" class="validate">
					</div>
					<div class="col-md-4">	      
					<button class="btn waves-effect waves-light" type="submit" name="action">подписаться</button>
				    </div>
				    </div>
				    <input type="hidden" value="{$token}" name="token"/>
				    </form>
			    </div>
			    
			    <script> 
					 	// wait for the DOM to be loaded 
					 	$(document).ready(function() { 
        	            // bind 'myForm' and provide a simple callback function 
                            $('#js__subscribe__form').ajaxForm(function() { 
                                 alert("Спасибо за подписку!"); 
                            }); 
                        }); 
                </script> 
			    
			    
			    
			    


