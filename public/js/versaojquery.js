(function($) {
	$.PluginJquery = function() {
		this.init();
	};

	$.fn.formValidation.DEFAULT_OPTIONS.framework = 'bootstrap';
    $.fn.formValidation.DEFAULT_OPTIONS.icon = {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
    };

	$("#inicio-cart").show();
	$("#inicio-home").hide();


	$.PluginJquery.prototype = {
		init: function() {
			this.imgPath = "localhost/cart";
			//se quiser colocar as ctes aqui

			this.onListeningPage();
			this.onListingProducts('produtos.json');
			this.onListingCategs('categorias.json');
			this.onShowDetails();

			this.onAdd();
			this.onUpd();
			this.onDel();
			this.onCancelCart();

			this.onConvert();
			this.onAddWish();
			this.onCancelWish();
			this.onDelWish();

			this.populaCamposForm();
			this.onLogin();
			this.onEnderecoForm();
			this.onCanaisContato();
			this.onPessoaFisicaForm();
			this.onPessoaJuridicaForm();
			this.onPrivacidadeForm();

			this.onPayPalClick();
			this.onPagSeguroClick();
			this.onBCashClick();
			this.onDinheiroClick();

			this.refresh();
		},

		// funcao que esconde/mostra home e cadastro
		onListeningPage: function(){
			$(".navbar-brand").on("click",function(e){
				e.preventDefault();
				$("#inicio-cart").hide();
				$("#inicio-home").show();

			});

			$(".link-cart").on("click",function(e){
				e.preventDefault();
				$("#inicio-cart").show();
				$("#inicio-home").hide();
			});
		},

		onListingCategs: function(file){
			alert('ooo');
			var menu = $('#menu-lateral');
			var self = this;
			$.getJSON(file, function(json,textStatus){
				if(json.length>0){
					$.each(json,function(index, val){
						if(val){
							//.addClass('list-group-item')	
							menu.append('<a href=#'+val.id+'>'+val.nome+'</a>');
						}
					})
				} else {
					alert("no categs");
				}
			})
		},

		onListingProducts: function(file){
			var self = this;
			$.getJSON(file, function(json,textStatus) {
				if(json.length>0){
					$.each(json, function(index, val) {
						if(val){
							self._listagem(val.id,val.nome,val.preco_de,val.preco,val.estoque,val.prazo,val.peso,val.img,val.desc);
						}
					});
				} else {
					alert("no results");
				}
			});			
		},

		_listagem: function(id,nome,preco_de,preco,estoque,prazo,peso,img,desc){
			var inicio = $('#inicio-home');
			var div_principal = $("<div/>").addClass('col-sm-3 col-md-3');
			var div_rotate = $("<div/>").addClass('thumbnail rotate');

			var disponibilidade,classe_ribbon="ribbon-verde";
			if(estoque > 0){
				disponibilidade = estoque +" peças";
			}else if(prazo==='E'){
				disponibilidade = "esgotado";
				classe_ribbon="ribbon-vermelha";
			}else{
				disponibilidade = prazo +" dias";
				classe_ribbon="ribbon-amarela";
			}

			var ribbon = $("<div/>").addClass('ribbon').addClass(classe_ribbon).html("<span>"+ disponibilidade +"</span>");
			
			var preco = this._convertString2Number(preco).toFixed(2);
			if(preco_de>0){
				var preco_de = this._convertString2Number(preco_de).toFixed(2);
			}

/*

    <div class="col-sm-3">
      <div class="card card-success">
        <div class="card-block">
          <h4 class="card-title"><?= substr($nome,0,20) ?></h4>
          <h6 class="card-subtitle text-muted"><a href="#" class="card-link">+ Asus</a></h6>
        </div>
        <img src="img/<?= $img ?>" class="img-thumbnail" alt="Card image">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><h4>R$ <?= $preco ?></h4></li>
          <li class="list-group-item text-success"><?= $disponib ?></li>
          <li class="list-group-item">
            <!-- <a href="#" class="card-link"><i class="fa fa-heart fa-2x"></i></a> -->
            <a href="carrinho.php?action=add&id=<?=$id?>" role="button" title="add to cart" class="card-link"><i class="fa fa-shopping-cart fa-2x"></i></a>
            <a href="detalhe.html" class="card-link"><i class="fa fa-external-link fa-2x"></i></a>
          </li>
        </ul>
      </div><!-- card -->
    </div><!-- .col-sm-3 -->
*/


			var imagem = $("<img/>").attr('src','images/'+img);
			var div_caption = $("<div/>").addClass('caption');
			var h2 = $("<h2/>").text(nome);
			var liEsq = $("<span/>").addClass('pull-left old-price').text(preco_de);
			var liDir = $("<span/>").addClass('pull-right price').text(preco);
			var ul = $("<div/>").addClass('precos').append(liEsq).append(liDir);
			var p_desc = $("<p/>").addClass('descricao clearfix').text(desc.substr(0,90));
			var p_botoes = $("<p/>").addClass('botoes')
				.attr("data-id",id)
				.attr('data-name',nome)
				.attr('data-price',preco)
				.attr('data-estoque',estoque)
				.attr('data-prazo',prazo)
				.attr('data-peso',peso)
				.attr('data-img',img)
				.attr('data-desc',desc);

	
			var i_coracao = $("<i/>").addClass('fa fa-heart');
			var a_coracao = $("<a/>").addClass('btn btn-default color1 wish').attr('title','add to wish').attr('role','button').append('<i class="fa fa-heart"></i>');
			
			var i_cart = $("<i/>").addClass('fa fa-shopping-cart');
			var a_cart = $("<a/>").addClass('btn btn-default color2 cart').attr('title','add to cart').attr('role','button').append('<i class="fa fa-shopping-cart"></i>');

			var i_details = $("<i/>").addClass('fa fa-shopping-cart');
			var a_details = $("<a/>").addClass('btn btn-default color3 details').attr('title','details').attr('role','button').append('<i class="fa fa-shopping-cart"></i>');

			p_botoes.append(a_coracao).append(a_cart).append(a_details);
			div_caption.append(h2).append(ul).append(p_desc).append(p_botoes);
			div_principal.append(div_rotate.append(ribbon).append(imagem).
				append(h2).append(div_caption)).appendTo(inicio);

		},


		onShowDetails: function(){
			var self = this;
			$('body').on('click','a.details', function (e) {
				e.preventDefault();
				var elem = $(this).parent('.botoes');
				var id = elem.data('id');
				var name = elem.data("name");
				var price = elem.data("price");
				var peso = elem.data("peso");
				var img = elem.data("img");

				var modal = $('#modalDetalhes');

				$('#modalDetalhes h3').html(name);

				var im = $('<img/>').attr('src','images/'+img);
				$('#modalDetalhes .modal-body').html(im);
				$('#modalDetalhes .modal-body').append('R$ '+price);

				modal.modal('show');

			});
		},


		onAdd: function() {
			var self = this;
			$('body').on('click','a.cart', function (e) {
				e.preventDefault();
				var elem = $(this).parent('.botoes');
				self._add(elem,true);
			});
		},	

		onAddWish: function() {
			var self = this;
			$('body').on('click','a.wish', function (e) {
				e.preventDefault();
				var elem = $(this).parent('.botoes');
				self._addWish(elem);
			});
		},	

		onConvert: function(){
			var self = this;
			var wish = JSON.parse(localStorage.getItem('wish'))

			$('body').on('click','a.convertWish', function (e) {
				e.preventDefault();
				var selected = [];
				//alert('hh');
				//analisar melhor pois acho q o nome do checkbox tem q ser convert[]
				$('#wishContainer input:checked').each(function() {
				    selected.push($(this).data('id'));
				});
				if(selected.length > 0){
					console.log(selected.length +' do tipo '+ typeof selected);
					$.each(selected, function(i,id) {
						$.each(wish, function(index, val) {
							if(val){
								if(val['id']==id){
									//alert(id);
									var o = wish[index];
									//alert(o.id);
									var el = $("<p/>");
									el.attr('data-id',id);
									el.attr("data-name",o.name);
									el.attr("data-price",o.preco);
									el.attr("data-peso",o.peso);
									el.attr("data-img",o.img);
									//alert(el.data('id'));
									//var o = self._format2Obj(id,name,price,peso,qtd,img);
									//tem que ser um elemento para a _add(el)
									self._add(el,false);
									//para cada id fazer o convert
									self._delWish(id);

								}
							}
						});
					});
				}
			});
			this.refresh();
		},

		onDel: function() {
			var self = this; // qdo usar isto ?
			$('body').on('click', 'a.del-cart', function(e) {
				e.preventDefault();
				var id = $(this).data("id");
				self._del(id); // dar o refresh
			});	
		},	

		_del:function(id){
			var cart = JSON.parse(localStorage.getItem('cart'))
			if(cart){
				$.each(cart,function(i,val){
					if(val){
						if(val['id']==id){
							//cart.splice(cart[i],1);
							cart.splice(i,1); 
						}
					}
				});
			}

			localStorage.setItem('cart',JSON.stringify(cart));
			var frete = this._getFrete(cart);
			localStorage.setItem('frete',frete.toFixed(2));
			this.refresh();
		},

		_add:function(elem,drag){
			var self = this;
			localData = localStorage.getItem("cart");
			var products = (localData==null)?[]:JSON.parse(localData);
			var id = elem.data('id');
			var name = elem.data("name");
			var price = elem.data("price");
			var peso = elem.data("peso");
			var img = elem.data("img");
			var qtd  = 1;
			var existe = false;
		    $.each( products, function(i, val) {
		        if (val) {  
		            if (val["id"] == id) {
		            	existe = true;
		                val["qtd"]++;
		            }
		        }
		    });

		    if(!existe){
			    var o = self._format2Obj(id,name,price,peso,qtd,img);
			   	products.push(o);
			   	if(drag){
					var imgtodrag = elem.parents(".thumbnail").children('img');
					this._fly(imgtodrag);
			   	}
		    } 

			localStorage.setItem('cart', JSON.stringify(products));
			var frete = this._getFrete();
			localStorage.setItem('frete',frete.toFixed(2));
			this.refresh();

		},

		_addWish:function(elem){
			var self = this;
			localData = localStorage.getItem("wish");
			var products = (localData==null)?[]:JSON.parse(localData);
			var id = elem.data('id');
			var name = elem.data("name");
			var price = elem.data("price");
			var peso = elem.data("peso");
			var img = elem.data("img");
			var qtd  = 1;
	    	var existe=false;
		    $.each( products, function(i, val) {
		        if (val) {  
		            if (val["id"] == id) {
		            	existe=true;
		            }
		        }
		    });
		    if(!existe){
			    var o = self._format2Obj(id,name,price,peso,qtd,img);
			   	products.push(o);
				localStorage.setItem('wish', JSON.stringify(products));
		    }
		    this.refresh();
		},

		onDelWish: function() {
			var self = this; // qdo usar isto ?
			$('body').on('click', 'a.del-wish', function(e) {
				e.preventDefault();
				var id = $(this).data("id");
				self._delWish(id);
			});	
		},	

		_delWish:function(id){
			var wish = JSON.parse(localStorage.getItem('wish'))
			if(wish){
				$.each(wish,function(i,val){
					if(val){
						if(val['id']==id){
							wish.splice(i,1); 

						}
					}
				});
			}
			localStorage.setItem('wish',JSON.stringify(wish));
			//se nao ficou nenhum , this._cancel('wish');
			this.refresh();
		},

		//refaz as contas e printa de novo os carts
		refresh:function(){
			this._show('wish');
			this._show('cart');
		},

		_fly:function(imgtodrag){
			var cart = $(".btn-cart");
    		if (imgtodrag) {
        		var imgclone = imgtodrag.clone().removeClass('img-circle').offset({
            		top: imgtodrag.offset().top,
            		left: imgtodrag.offset().left
            		
        		})
            	.css({
                	'opacity': '0.5',
                    'position': 'absolute',
                    'height': '250px',
                    'width': '250px',
                    'z-index': '10000'
	            })
                .appendTo($('body'))
                .animate({
	                'top': cart.offset().top + 20,
                    'left': cart.offset().left + 50,
                    'width': 55,
                    'height': 55
	            }, 1500);

	            imgclone.animate({
	            	'width':0,
	            	'height':0
	            	}, function(){
            			$(this).detach();
        		});
        	}//imgtodrag
 		},
		
		_getPeso:function(){
			var products = JSON.parse(localStorage.getItem('cart'));
			var tot = 0;
			if(products){
				$.each(products,function(i,val){
					if(val){
						tot += parseInt(val['qtd'])*val['peso'];
					}
				});
			}
			return tot;
		},

		_getFrete: function() {
			var peso = this._getPeso();
			var fator = 5;
			return peso > 0? fator*=peso : 0;
		},

		_getSubTot:function(){
			var products = JSON.parse(localStorage.getItem('cart'));
			var tot = 0;
			if(products){
				$.each(products,function(i,val){
					if(val){
						tot += parseInt(val['qtd'])*val['preco'];
					}
				});
			}
			return tot;
		},

		_getQtd:function(name){
			var products = JSON.parse(localStorage.getItem(name));
			var tot = 0;
			if(products){
				$.each(products,function(i,val){
					if(val){
						tot += parseInt(val['qtd']);
					}
				});
			}
			return tot;
		},

		_show: function(name) {
		    Container   = JSON.parse(localStorage.getItem(name));
		    qtd         = this._getQtd(name);
		    wishTbody   = '';
		    cartTbody   = '';
		    subTotal    = this._getSubTot();
		    frete       = this._getFrete();
		    total       = subTotal+frete;


		    $( "." + name + "Count" ).text(qtd);
		    
		    if (qtd < 1) {
		        if (name == "wish") {
		            wishTbody += '<tr><td>empty !</td></tr>';
		            $("#wishContainer tbody").html(wishTbody);
		        }
		        if (name == "cart") { 
		            cartTbody += '<tr><td>empty !!</td></tr>';
		            $(".cartMenu tbody").html(cartTbody);
		            $(".subtotal").text('R$' + subTotal.toFixed(2));
		            $(".frete").text('R$' + frete.toFixed(2));
		            $(".total").text('R$' + total.toFixed(2));
		        }
		    } else {

		        if (name == "wish") {
		             if (Container) {
		                $.each(Container, function(index, value) {
		                    if (value !== null) {    
		                        wishTbody += '<tr>' +
		                            '<td><input type="checkbox" data-id='+value['id']+' name="convert[]"></td>' +
		                            '<td><a href="#"><img src="images/' + value['img']+ '" class="thumbs"></a></td>' +
		                            '<td><a href="#">' + value['name'] + '</a></td>' +
		                            '<td>' + value['preco'] + '</td>' +
		                            '<td><a href="#" role="button" aria-label="delete" class="btn btn-danger btn-xs pull-right del-wish" title="del" data-id=' + value['id'] + '>x</a></td>' +
		                        '</tr>';
		                    }                
		                });
		            }
		            $("#wishContainer tbody").html(wishTbody);        
		        }
		    
		        if (name == "cart") { 
		            if (Container) {
		                $.each(Container, function(index, value) {
		                    if (value) {    
		                        var totalPrice  = value['qtd'] * value['preco'];
		                        cartTbody   += '<tr>' +
		                            '<td><a href="#"><img src="images/' + value['img'] + '" class="thumbs"><a></td>'+
		                            '<td><a href="#">'+ value['name'] +'</a></td>'+
									'<td><input data-id='+value['id']+' type="text" class="input-qtd-upd" value="'+value['qtd']+'" aria-describedby="update"></td>'+
		                            '<td class="text-right">'+ totalPrice.toFixed(2) + '</td>'+
		                            '<td><a href="#" role="button" class="btn btn-danger btn-xs pull-right del-cart" title="remove" data-id=' + value['id'] + '>x</a></td>' +
		                        '</tr>';
		                    } 
		                });
			            $(".cartMenu tbody").html(cartTbody); 
		            }
		            $(".subtotal").text('R$' + subTotal.toFixed(2));
		            $(".frete").text('R$' + frete.toFixed(2));
		            $(".total").text('R$' + total.toFixed(2));
		        }
		    }
		},

		_format2Obj:function(id,name,preco,peso,qtd,img){
			var o = new Object();
			o.id = id;
			o.name = name;
			o.preco = preco;
			o.peso = peso;
			o.qtd = qtd;
			o.img = img;
			return o;
		},


		onUpd: function() {
			var self = this;
			$('body').on('keyup', '.input-qtd-upd', function(e) {
			    if (e.keyCode == 38) { // up arrow
			        $(this).val(++qtd);
			        e.preventDefault();
			    } else if (e.keyCode == 40) { // down arrow
			        if (qtd <= 0){
			        	return;
			        }
			        $(this).val(--qtd);
			        e.preventDefault();
			    }    

				var id = $(this).data('id');
			    var qtd = parseInt($(this).val());
				self._upd(id,qtd);
			});			

		},	

		_upd:function(id,qtd){
			var qtd = qtd > 100? 100 : qtd;
			var cart = JSON.parse(localStorage.getItem('cart'))
			if(cart){
				$.each(cart,function(i,val){
					if(val){
						if(val['id']==id){
							if(qtd > 0)
								val['qtd'] = parseInt(qtd);
							else
								cart.splice(i,1);
						}	
					}
				});
			}
			localStorage.setItem('cart',JSON.stringify(cart));
			var frete = this._getFrete(cart);
			localStorage.setItem('frete',frete.toFixed(2));
			this.refresh();
		},

		onCancelCart: function() {
			var self = this;
			$('.emptyCart').on('click', function (e) {
				e.preventDefault();
				self._cancel("cart");
			});
		},

		onCancelWish: function() {
			var self = this;
			$('.emptyWish').on('click', function (e) {
				e.preventDefault();
				self._cancel("wish");
			});
		},

		_cancel: function(tipo) {
			localStorage.removeItem(tipo);
			if(tipo=='cart'){
				localStorage.removeItem("frete");
			}
			this.refresh();
		},



		populaCamposForm: function(){
			var endereco = JSON.parse(localStorage.getItem('endereco'))
			if(endereco){
			    $.each(endereco, function(i, campo) {
			    	if(campo){
			    		$('#enderecoForm input[name="'+ i +'"]').val(campo);
			    	}
			    });
			}


			var canais = JSON.parse(localStorage.getItem('canais'))
			if(canais){
			    $.each(canais, function(i, campo) {
			    	if(campo){
			    		$('#canaisContato input[name="'+ i +'"]').val(campo);
			    	}
			    });
			}

			var PF = JSON.parse(localStorage.getItem('PF'))
			if(PF){
			    $.each(PF, function(i, campo) {
			    	if(campo){
			    		$('#pessoaFisicaForm input[name="'+ i +'"]').val(campo);
			    	}
			    });
			}

			var PJ = JSON.parse(localStorage.getItem('PJ'))
			if(PJ){
			    $.each(PJ, function(i, campo) {
			    	if(campo){
			    		$('#pessoaJuridicaForm input[name="'+ i +'"]').val(campo);
			    	}
			    });
			}

			var senha = JSON.parse(localStorage.getItem('senha'))
			if(senha){
	    		$('#privacidadeForm input[name="password"]').val(senha);
			}

		},


		onLogin: function(){
	    	$('#signinForm').formValidation({
	            addOns: {
                    reCaptcha2: {
                        element: 'captchaContainer',
                        language: 'en',
                        theme: 'light',
                        siteKey: '6LdQwwsTAAAAALxtrKKjrCwpMTI2saUGSpJNHJHV',
                        timeout: 120,
                        message: 'The captcha is not valid'
                    }
	            },            
	            fields: {
	                email: {
	                    row: '#username',
	                    validators: {
	                        notEmpty: {
	                            message: 'The title is required'
	                        }
	                    }
	                },
	                senha: {
	                    validators: {
	                        notEmpty: {
	                            message: 'The content is required'
	                        }
	                    }
	                }
	            }
	        });

		},



		onEnderecoForm: function(){

			$('#enderecoForm').formValidation({
	            fields: {
	                cep: {
	                    row: '.col-xs-4',
	                    validators: {
	                        notEmpty: {
	                            message: 'The first name is required'
	                        }
	                    }
	                },
	                endereco: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },

	                num: {
	                    row: '.col-xs-2',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },

	                bairro: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },
	                cidade: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },

	                estado: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                }
	            }
	        })
	        .on('keyup', '[name="cep"]', function() {
	            var cep = $(this).val();
	            if(cep.length == 8){
	                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {
	                    if (!("erro" in data)) {
	                        $('input[name="endereco"]').val(data.logradouro);
	                        $('input[name="bairro"]').val(data.bairro);
	                        $('input[name="cidade"]').val(data.localidade);
	                        $('select[name="estado"] option[value="'+data.uf+'"]').prop('selected',true);
	                        $('input[name="num"]').focus();
	                    } else {
	                        alert('erroooo');
	                    }
	                });    
	            }
	        })
	        .on('success.form.fv', function(e) {
	            e.preventDefault();
	            // Some instances you can use are
	            var $form = $(e.target),        // The form instance
	                fv    = $(e.target).data('formValidation'); 
	                // FormValidation instance
	                //var end = JSON.stringify($form.serializeArray());

	            var o = new Object();
	            o.cep = $form.find('input[name="cep"]').val();
	            o.endereco = $form.find('input[name="endereco"]').val();
	            o.num = $form.find('input[name="num"]').val();
	            o.bairro = $form.find('input[name="bairro"]').val();
	            o.cidade = $form.find('input[name="cidade"]').val();
	            o.estado = $form.find('select[name="estado"] > option:selected').val();
	            
	            localStorage.setItem('endereco',JSON.stringify(o));    
	            $('#menu-tab-cadastro li:eq(1) a').tab('show');
	        });

		},



		onCanaisContato: function(){
		    var MAX_OPTIONS = 5;
		    $('#canaisContato').formValidation({
	            fields: {
	                site: {
	                    validators: {
	                        notEmpty: {
	                            message: 'Informe o site da empresa'
	                        }
	                    }
	                },
	                'tels[]': {
	                    validators: {
	                        notEmpty: {
	                            message: 'Informe o telefone'
	                        },
	                        stringLength: {
	                            max: 100,
	                            message: 'The option must be less than 100 characters long'
	                        }
	                    }
	                },
	                'emails[]': {
	                    validators: {
	                        notEmpty: {
	                            message: 'Informe o email'
	                        },
	                        stringLength: {
	                            max: 100,
	                            message: 'The option must be less than 100 characters long'
	                        }
	                    }
	                }
	            }
	        })
	        //==============================================
	        .on('click', '.addButtonEmail', function() {
	            var $template = $('#emailsTemplate'),
	                $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
	                $option   = $clone.find('[name="emails[]"]');

	            // Add new field
	            $('#canaisContato').formValidation('addField', $option);
	        })

	        // Remove button click handler
	        .on('click', '.removeButtonEmail', function() {
	            var $row    = $(this).parents('.group-emails'),
	                $option = $row.find('[name="emails[]"]');
	            // Remove element containing the option
	            $row.remove();
	            // Remove field
	            $('#canaisContato').formValidation('removeField', $option);
	        })
	        // Called after adding new field
	        .on('added.field.fv', function(e, data) {
	            // data.field   --> The field name
	            // data.element --> The new field element
	            // data.options --> The new field options

	            if (data.field === 'emails[]') {
	                if ($('#canaisContato').find(':visible[name="emails[]"]').length >= MAX_OPTIONS) {
	                    $('#canaisContato').find('.addButtonEmail').attr('disabled', 'disabled');
	                }
	            }
	        })
	        // Called after removing the field
	        .on('removed.field.fv', function(e, data) {
	           if (data.field === 'emails[]') {
	                if ($('#canaisContato').find(':visible[name="emails[]"]').length < MAX_OPTIONS) {
	                    $('#canaisContato').find('.addButtonEmail').removeAttr('disabled');
	                }
	            }
	        })
	        // Add button click handler
	        .on('click', '.addButtonTel', function() {
	            var $template = $('#telsTemplate'),
	                $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
	                $option   = $clone.find('[name="tels[]"]');

	            $('#canaisContato').formValidation('addField', $option);
	        })
	        .on('click', '.removeButton', function() {
	            var $row    = $(this).parents('.form-group'),
	                $option = $row.find('[name="tels[]"]');
	            // Remove element containing the option
	            $row.remove();
	            $('#canaisContato').formValidation('removeField', $option);
	        })
	        // Called after adding new field
	        .on('added.field.fv', function(e, data) {
	            // data.field   --> The field name
	            // data.element --> The new field element
	            // data.options --> The new field options

	            if (data.field === 'tels[]') {
	                if ($('#canaisContato').find(':visible[name="tels[]"]').length >= MAX_OPTIONS) {
	                    $('#canaisContato').find('.addButtonTel').attr('disabled', 'disabled');
	                }
	            }
	        })
	        .on('removed.field.fv', function(e, data) {
	           if (data.field === 'tels[]') {
	                if ($('#canaisContato').find(':visible[name="tels[]"]').length < MAX_OPTIONS) {
	                    $('#canaisContato').find('.addButtonTel').removeAttr('disabled');
	                }
	            }
	        })

	        .on('success.form.fv', function(e) {
	            e.preventDefault();
	            var $form = $(e.target),        // The form instance
	                fv    = $(e.target).data('formValidation'); 

	            var o = new Object(); 
	            o.site = $form.find('input[name="site"]').val();
	            var ts = [];
	            $form.find('input[name="tels[]"]').each(function(i,val){
	            	ts.push($(this).val());
	            	var t = "tel"+i;
		            o.t = val;
	            });
	            o.emails = $form.find('input[name="emails[]"]').val();

	            localStorage.setItem('canais',JSON.stringify(o));    
	            $('#menu-tab-cadastro li:eq(2) a').tab('show');
	        });


		},

		onPessoaFisicaForm:function(){
			$('#pessoaFisicaForm').formValidation({
	            fields: {
	                nome: {
	                    row: '.col-xs-8',
	                    validators: {
	                        notEmpty: {
	                            message: 'The first name is required'
	                        }
	                    }
	                },
	                sexo: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },
	                cpf: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        },
	                        id: {
	                            enabled: true,
	                            country: 'BR',
	                            message: 'CPF obrigat'                                
	                        }
	                    }
	                },
	                rg: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },
	                nascimento: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                }
	            }
	        })
	        .on('input keyup', '[name="cpf"]', function() {
	            if($(this).val().length===11){
	                $('#pessoaFisicaForm')
	                .formValidation('enableFieldValidators', 'cpf', false, 'vat')
	                .formValidation('revalidateField', 'cpf');
	            }
	        })

	        .on('success.form.fv', function(e) {
	            e.preventDefault();
	            var $form = $(e.target),        // The form instance
	                fv    = $(e.target).data('formValidation'); 

	            var o = new Object();
	            o.nome = $form.find('input[name="nome"]').val();
	            o.sexo = $form.find('input[name="sexo"]').val();
	            o.cpf = $form.find('input[name="cpf"]').val();
	            o.rg = $form.find('input[name="rg"]').val();
	            o.nascimento = $form.find('input[name="nascimento"]').val();

	            localStorage.setItem('PF',JSON.stringify(o));    
	            $('#menu-tab-cadastro li:eq(5) a').tab('show');
	        });


		},

		onPessoaJuridicaForm: function(){
			$('#pessoaJuridicaForm').formValidation({
	            fields: {
	                nome: {
	                    row: '.col-xs-8',
	                    validators: {
	                        notEmpty: {
	                            message: 'The first name is required'
	                        }
	                    }
	                },
	                cnpj: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        },
	                        vat: {
	                            enabled: true,
	                            country: 'BR',
	                            message: 'cnpj obrigat'                                
	                        }
	                    }
	                },
	                ie: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                },
	                abertura: {
	                    row: '.col-xs-6',
	                    validators: {
	                        notEmpty: {
	                            message: 'The last name is required'
	                        }
	                    }
	                }
	            }
		    })
		    .on('input keyup', '[name="cnpj"]', function() {
		        if($(this).val().length===14){
                    $('#pessoaJuridicaForm')
                    .formValidation('enableFieldValidators', 'cnpj', true, 'vat')
                    .formValidation('revalidateField', 'cnpj');

		        }    
		    })

	        .on('success.form.fv', function(e) {
	            e.preventDefault();
	            var $form = $(e.target),        // The form instance
	                fv    = $(e.target).data('formValidation'); 

	            var o = new Object();
	            o.nome = $form.find('input[name="nome"]').val();
	            o.sexo = $form.find('input[name="sexo"]').val();
	            o.cnpj = $form.find('input[name="cnpj"]').val();
	            o.ie = $form.find('input[name="ie"]').val();
	            o.abertura = $form.find('input[name="abertura"]').val();

	            localStorage.setItem('PJ',JSON.stringify(o));    
	            $('#menu-tab-cadastro li:eq(4) a').tab('show');
	        });


		},




		onPrivacidadeForm: function(){
	    	$('#privacidadeForm').formValidation({
		        fields: {
		            password: {
		                validators: {
		                    notEmpty: {
		                        message: 'The password is required'
		                    }
		                }
		            },
		            confirmPassword: {
		                validators: {
		                    notEmpty: {
		                        message: 'The confirm password is required'
		                    },
		                    identical: {
		                        field: 'password',
		                        message: 'The password and its confirmation one have to be the same'
		                    }
		                }
		            },
		            agree: {
		                excluded: false,
		                validators: {
		                    callback: {
		                        message: 'You must agree with the terms and conditions',
		                        callback: function(value, validator, $field) {
		                            return value === 'yes';
		                        }
		                    }
		                }
		            }
		        }
		    });

		    $('#agreeButton, #disagreeButton').on('click', function() {
		        var whichButton = $(this).attr('id');
		        $('#privacidadeForm')
		        .find('[name="agree"]')
		        .val(whichButton === 'agreeButton' ? 'yes' : 'no')
		        .end()
		        .formValidation('revalidateField', 'agree');
		    })

	        .on('success.form.fv', function(e) {
	            e.preventDefault();
	            var $form = $(e.target),        // The form instance
	                fv    = $(e.target).data('formValidation'); 

	            var o = new Object();
	            //fazer hash
	            o.password = $form.find('input[name="password"]').val();

	            localStorage.setItem('password',JSON.stringify(o));  
	            //vai pra pagaemto  
	            $('#accordion div:eq(3) a').tab('show');
	        });

		},



		_getCEPviaLink:function(){
	        alert('correios');
		},

		_getHTML5GeoLocation:function(){
	        if (navigator.geolocation) {
	            navigator.geolocation.getCurrentPosition(
	                function(position){//funcao de sucesso
	                    var pos = {
	                        lat: position.coords.latitude,
	                        lng: position.coords.longitude
	                    };
			            var res = this._getLatLng(pos.lat,pos.lng);
	                },
	                function(error){//funcao de erro
	                    switch(error.code) {
	                        case error.PERMISSION_DENIED:
	                            alert("User denied the request for Geolocation.");
	                            break;
	                        case error.POSITION_UNAVAILABLE:
	                            alert("Location information is unavailable.");
	                            break;
	                        case error.TIMEOUT:
	                            alert("The request to get user location timed out.");
	                            break;
	                        case error.UNKNOWN_ERROR:
	                            alert("An unknown error occurred.");
	                            break;
	                    }
	                }
	            );

	        } else {
	            alert("nao suporta");
	        }

    	},

		_getIP: function(){
	        $.get("http://ipinfo.io", function(data) {
	            console.log(data.ip, data.loc);
	            $('input[name="cidade"]').val(data.city);
	            $('input[name="endereco"]').focus();
	            //par lat long
	            var loc = data.loc;
	            var l = loc.split(",");
	            var res = this._getLatLng(l[0],l[1]);

	        }, "jsonp");
	        return res;
		},

		_getLatLng: function(lat,lng){
			var geocoder = new google.maps.Geocoder();

			var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
			geocoder.geocode({'location': latlng}, function(results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
				  if (results[1]) {
				    //Copacabana, Rio de Janeiro - RJ, Brasil 
				    console.log(results[1].formatted_address);
				  } else {
				    window.alert('No results found');
				  }
				} else {
				  window.alert('Geocoder failed due to: ' + status);
				}
			});
			return results[1].formatted_address;
		},



		onBCashClick: function(){
			var self = this;
		    $("#bcash").on('click',function(e){
		        e.preventDefault();

		        var frete = JSON.parse(localStorage.getItem("frete"));
		        var dados={
		            email_loja:"gustavo@lga.com.br ",
		            url_retorno:"",
		            url_aviso:"",
		            redirect:"true",
		            redirect_time:"30",
		            free:"num pedido",
		            desconto:"0",
		            acrescimo:"0",
		            frete:frete

		        };


		        var urlAction = "https://www.bcash.com.br/checkout/pay/";
		        var form = self._criaElementoForm(dados,urlAction);
		        
		/*
		        var endereco = JSON.parse(localStorage.getItem("cart"));
		        var map_end = {
		            name:"nome",
		            cpf:"cpf",
		            rg:"rg",
		            sexo
		            data_nascimento
		            cliente_razao_social 
		            cliente_cnpj 
		            fone:"telefone",
		            celular:"celular",

		            endereco:"endereco",
		            bairro:"bairro",
		            cidade:"cidade",
		            estado:"estado",
		            email:"senderEmail",
		            cep:"cep"

		        }
		        for(var i in endereco[0]){
		            for(var j in map_end){
		                arg = $('<input type="hidden" />');
		                arg.attr('name', map_end[j]);
		                arg.attr('value', endereco[i][j]);
		                form.append(arg);
		                console.log(map_end[j]+'--'+endereco[i][j]);
		            }
		        }
		*/

		        var cart = JSON.parse(localStorage.getItem("cart"));
		        var map = {
		            name: 'produto_descricao_',
		            qtd: 'produto_qtde_',
		            preco: 'produto_valor_',
		            id: 'produto_codigo_'
		        };


		        self._preencheItemsCart(form,map);

		        self._finalizaSubmitForm(form);


		    });

		},

		_criaElementoForm: function(dados,urlAction){
	        var form = $("<form />");
	        form.attr("action",urlAction);
	        form.attr("method","post");
	        form.attr("target","_blank");
	        for(var valor in dados){
	            hidden = $('<input type="hidden" />');
	            hidden.attr("name",valor);
	            hidden.attr("value",dados[valor]);
	            form.append(hidden);
	        }
	        return form;
		},


		_preencheItemsCart: function(form,map){
	        var cart = JSON.parse(localStorage.getItem("cart"));
	        var map = {
	            name: 'produto_descricao_',
	            qtd: 'produto_qtde_',
	            preco: 'produto_valor_',
	            id: 'produto_codigo_'
	        };

	        var contador = 0;
	        for (var item in cart) {
	            contador++;
	            for (var campo in cart[item]) {
	                for (var key in map) {
	                    if(key==campo) {
	                        valor = cart[item][campo];
	                        if(key=="preco"){
	                        	var precoFloat = this._convertString2Number(valor);
		                    	//alert('valor:'+valor.toFixed(2)+ ' key:'+key+' campo:'+campo);
	                            valor = precoFloat.toFixed(2);
	                        }
	                        arg = $('<input type="hidden" />');
	                        arg.attr('name', map[key] + contador);
	                        arg.attr('value', valor);
	                        form.append(arg);
	                        //console.log(map[k]+'--'+cart[g][i]);
	                    }
	                }
	            }
	        }
	        return form;

		},

		_finalizaSubmitForm: function(form){
	        $("#forma-pagamento").html(form);
	        $("#forma-pagamento").append(form);
	        form.submit();
	        form.remove();
	        //void()
		},


		onPagSeguroClick: function(){
			var self = this;
		    $("#pagseguro").on('click',function(e){
		        e.preventDefault();

		        var frete = JSON.parse(localStorage.getItem("frete"));
		        var dados={
		            receiverEmail:"voipgus@gmail.com",
		            currency:"BRL",
		            itemShippingCost:frete,
		            reference:"num pedido"

		        };
		        var urlAction = "https://pagseguro.uol.com.br/v2/checkout/payment.html";
		        var form = self._criaElementoForm(dados,urlAction);

		        var cliente = JSON.parse(localStorage.getItem("cliente"));
		        var endereco = JSON.parse(localStorage.getItem("endereco"));
		        var contato = JSON.parse(localStorage.getItem("contato"));
		        var map_end = {
		            name:"senderName",
		            endereco:"shippingAddressStreet",
		            num:"shippingAddressNumber",
		            bairro:"shippingAddressDistrict",
		            cidade:"shippingAddressCity",
		            estado:"shippingAddressState",
		            cep:"shippingAddressPostalCode",
		            email:"senderEmail",
		            fone:"senderPhone",
		            ddd:"senderAreaCode"

		        }
		        if(endereco){
			        for(var i in endereco[0]){
			            for(var j in map_end){
			                arg = $('<input type="hidden" />');
			                arg.attr('name', map_end[j]);
			                arg.attr('value', endereco[i][j]);
			                form.append(arg);
			                console.log(map_end[j]+'--'+endereco[i][j]);
			            }
			        }
		        	
		        }

		        var map = {
		            name: 'itemDescription',
		            qtd: 'itemQuantity',
		            preco: 'itemAmount',
		            id: 'itemId'
		        };

		        self._preencheItemsCart(form,map);

		        self._finalizaSubmitForm(form);


		    });

		},

		onPayPalClick: function(){
			var self = this;
		    $("#paypal").on('click',function(e){
		        e.preventDefault();
		        var frete = JSON.parse(localStorage.getItem("frete"));
		        var dados={
		            cmd:"_xclick", //_xclick=comprar agora ou doacao
		            business:"voipgus@gmail.com",
		            currency_code:"BRL",
		            country_code:"BR",
		            lc:"BR",
		            charset:"UTF-8",
		            no_note:0,//0 ou 1
		            "return":"http://www.domain.com/shop/",
		            //========================
		            //item_name:"Donation",
		            //item_number:"tutorial xpto", //item_name_1
		            //amount:"29.00",//subtotal
		            no_shipping:"1",//nao pedira endereco
		            //========================
		            invoice:"num pedido",
		            custom:"valor custom",
		            cbt:"Return to My Site",
		            //bn:"PP-BuyNowBF:btn_paynowCC_LG.gif:NonHostedGuest",
		            //image_url:"www.logo.jpg",
		            cs:"0",//background wite
		            display:"1",
		            cancel_return:"http://www.domain.com/shop/",
		            shipping:frete


		        };

		        var urlAction = "https://www.paypal.com/cgi-bin/webscr";
		        var form = self._criaElementoForm(dados,urlAction);

		        
		/*
		        var endereco = JSON.parse(localStorage.getItem("cart"));
		        var map_end = {
		            name:"first_name",
		            endereco:"address1",
		            cidade:"city",
		            estado:"state",
		            email:"email",
		            cep:"zip"

		        }
		        for(var i in endereco[0]){
		            for(var j in map_end){
		                arg = $('<input type="hidden" />');
		                arg.attr('name', map_end[j]);
		                arg.attr('value', endereco[i][j]);
		                form.append(arg);
		                console.log(map_end[j]+'--'+endereco[i][j]);
		            }
		        }
		*/

		        var cart = JSON.parse(localStorage.getItem("cart"));
		        var map = {
		            name: 'item_name_',
		            qtd: 'quantity_',
		            preco: 'amount_',
		            //shipping: 'shipping_', //frete unitario
		            //handling: 'handling_', //embrulhar
		            id: 'item_number_'
		        };

		        self._preencheItemsCart(form,map);

		        self._finalizaSubmitForm(form);

		    });

		},

		onDinheiroClick: function(){
			var self = this;
		    $("#dinheiro").on('click',function(e){
		        e.preventDefault();
		        var ip;
		        //var ip = this._getIP();
		        //alert(ip);
		        var data = new Date().toUTCString();
		        var cod = Math.random().toString(36).slice(2).toUpperCase().substring(1,11);
		        //localStorage.clear();
		        var numIP = ip || 'num IP';
		        var msg = "Ped #"+ cod +" em "+ data +" por "+numIP;
		        //alert(msg);
		        //$('#msg-ped-fechado').empty().html(msg);
		        //$('h1').html('Concluido com sucesso').appendTo('.jumbotron');
		        //$('p').html(msg).appendTo('.jumbotron');
		        self._finalizaPedidoSucesso(msg);

		    });

		},



		_finalizaPedidoSucesso: function(msg){

	        $('#heading5 h4 a').empty().html(msg);
	        $('<h1/>').html('Concluido com sucesso').appendTo('.jumbotron');
	        $('<p/>').html(msg).appendTo('.jumbotron');
	        this._deleteStorageByKey('cart');//so vou del o cart
	        return true;
		},

		_deleteStorageByKey:function(param){

		},



		_convertString2Number: function( numStr ) {
			var num;
			if( /^[-+]?[0-9]+.[0-9]+$/.test( numStr ) ) {
				num = parseFloat( numStr );
			} else if( /^d+$/.test( numStr ) ) {
				num = parseInt( numStr );
			} else {
				num = Number( numStr );
			}
			if( !isNaN( num ) ) {
				return num;
			} else {
				console.warn( numStr + " cannot be converted into a number" );
				return false;
			}
		}					



	};//Shop.prototype
	$(function() {
		new $.PluginJquery(); // object's instance
	});
})( jQuery );