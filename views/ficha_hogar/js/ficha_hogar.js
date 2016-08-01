
$(document).ready(menu);


   function menu(){
    $('#datosUrbano').hide();
    $('#datosRural').hide();
    $('#fila-nueva').hide();

    $('select').not('.disabled').material_select();

    $("input[name=ubicacion]").click(zonasHogares);
    $("#agregarFamiliar").click(function(){  agregarFamiliar($('#oculto').val()); });
    $("#eliminarFamiliar").click(eliminarFamiliar);
   
     $("select[name=municipio]").change(function(){

           $("input[name=codigo_municipio]").val($(this).val());
           barrio=$("input[name=codigo_barrio]").val(); 
           Identidad=$('#ficha_doc').val();
           $("#codigo_hogar").val($(this).val()+barrio+'-'+Identidad);
           $('#cod_').removeClass('blue');
           $('#cod_').addClass('visto');
    

    });



/*
$("input[name=buscar]").change(function(){


        $("input[name=codigo_barrio]").val($(this).attr('id')); 

         if ( $('input:radio[name=ubicacion]:checked').val() == '1') {
       
         $("#codigo_hogar").val();
         var v =   $("input[name=codigo_municipio]").val();
         $("#codigo_hogar").val(v+$(this).val()); 


      }
  
      
    });

*/
/*

 $('#tabla-adiccionHigiene tbody tr:eq(0) select[name="consumePsicoactivos[]"] ').change(function(){
          if ($(this).val() !='393') {
             Materialize.toast('ATENCION: Brindar valoración por psicología', 7000);
        }
         
          });

*/
 $("select[name=nombreVereda]").change(function(){


         if ( $('input:radio[name=ubicacion]:checked').val() == '2') {
      
         $("#codigo_hogar").val();
         var v =   $("input[name=codigo_municipio]").val();
         Identidad=$('#ficha_doc').val();
         $("input[name=numVereda]").val($(this).val()); 
         $("#codigo_hogar").val(v+$(this).val()+'-'+Identidad); 

      }
     
      
    });

  $("#ficha_doc").keyup(function(){

         if ($('input:radio[name=ubicacion]:checked').val() == '1') {
      
             $("#codigo_hogar").val();
             var m =   $("input[name=codigo_municipio]").val();
             var b =   $("input[name=codigo_barrio]").val();  
             $("#codigo_hogar").val(m+b+"-"+$(this).val()); 

        }else if($('input:radio[name=ubicacion]:checked').val() == '2'){
              $("#codigo_hogar").val();
              var m =   $("input[name=codigo_municipio]").val();
              var b =   $("input[name=numVereda]").val();  
              $("#codigo_hogar").val(m+b+"-"+$(this).val()); 

        }
     
      
    });

  $("#create_account" ).prop( "disabled", true );
  $('#guardarFirma').click(ActivarBotonGuardar); 

//alert( $("select[name=tipoHogar]").has('option').val());
   
     $('#tabla-hogar tbody tr:eq(0) .name1').keyup(function(){
     $('#tablaSocioeconomica tbody tr:eq(0) .name2').val($(this).val());
     $('#tabla-vulnerabilidad tbody tr:eq(0) .name3').val($(this).val());
     $('#tabla-adiccionHigiene tbody tr:eq(0) .name4').val($(this).val());


     });

     $('.otratipoOcupacion').hide();
     $("#tablaSocioeconomica  tbody tr:eq(0) select[name='tipoOcupacion[]']").change(function(){
                 cualOpccion2('319','.otratipoOcupacion ',$(this).val(),'#tablaSocioeconomica  tbody tr:eq(0)');
     });

      $('.otracondicionDiscapacidad').hide();
      $("#tabla-vulnerabilidad  tbody tr:eq(0) select[name='condicionDiscapacidad[]']").change(function(){
                 cualOpccion2('343','.otracondicionDiscapacidad ',$(this).val(),'#tabla-vulnerabilidad tbody tr:eq(0)');            
     });

     $('.otragrupoEtnico').hide();
     $("#tabla-vulnerabilidad  tbody tr:eq(0) select[name='grupoEtnico[]']").change(function(){
                 cualOpccion2('348','.otragrupoEtnico ',$(this).val(),'#tabla-vulnerabilidad  tbody tr:eq(0)');
                 
     });





    $('.otratenenciaVivienda').hide();
    $("select[name=tenenciaVivienda]").change(function(){cualOpccion('86','.otratenenciaVivienda',$(this).val());});
    $('.otrazonaVivienda').hide();
    $("select[name=zonaVivienda]").change(function(){cualOpccion('99','.otrazonaVivienda',$(this).val());});
    $('.otratipoVivienda').hide();
    $("select[name=tipoVivienda]").change(function(){cualOpccion('90','.otratipoVivienda',$(this).val());});



    $('.otramaterialTecho').hide();
    $("select[name=materialTecho]").change(function(){cualOpccion('106','.otramaterialTecho',$(this).val());});
    $('.otramaterialParedes').hide();
    $("select[name=materialParedes]").change(function(){cualOpccion('113','.otramaterialParedes',$(this).val());});
    $('.otramaterialPiso').hide();
    $("select[name=materialPiso]").change(function(){cualOpccion('118','.otramaterialPiso',$(this).val());});



    $('.otraabastecimientoFuente').hide();
    $("select[name=abastecimientoFuente]").change(function(){cualOpccion('124','.otraabastecimientoFuente',$(this).val());});
    $('.otraabastecimientoTratamiento').hide();
    $("select[name=abastecimientoTratamiento]").change(function(){cualOpccion('129','.otraabastecimientoTratamiento',$(this).val());});
    $('.otraabastecimientoAlmacenamiento').hide();
    $("select[name=abastecimientoAlmacenamiento]").change(function(){cualOpccion('134','.otraabastecimientoAlmacenamiento',$(this).val());});

   
    $('.otradisposicionMecanismo').hide();
    $("select[name=disposicionMecanismo]").change(function(){cualOpccion('138','.otradisposicionMecanismo',$(this).val());});
    $('.otradisposicionDispocicion').hide();
    $("select[name=disposicionDispocicion]").change(function(){cualOpccion('143','.otradisposicionDispocicion',$(this).val());});
    $('.otradisposicionRecolecion').hide();
    $("select[name=disposicionRecolecion]").change(function(){cualOpccion('148','.otradisposicionRecolecion',$(this).val());});


    $('.otradisposicionDisposicionbasuras').hide();
    $("select[name=disposicionDisposicionbasuras]").change(function(){cualOpccion('153','.otradisposicionDisposicionbasuras',$(this).val());});
    $('.otraEnergia').hide();
    $("select[name=Energia]").change(function(){cualOpccion('159','.otraEnergia',$(this).val());});
    $('.otraCombustible').hide();
    $("select[name=Combustible]").change(function(){cualOpccion('166','.otraCombustible',$(this).val());});



    $('.otracocinaSeparada').hide();
    $("select[name=cocinaSeparada]").change(function(){cualOpccion('','.otracocinaSeparada',$(this).val());});
    $('.otrariegosFisicos').hide();
    $("select[name=riegosFisicos]").change(function(){cualOpccion('176','.otrariegosFisicos',$(this).val());});
    $('.otrariesgosQuimicos').hide();
    $("select[name=riesgosQuimicos]").change(function(){cualOpccion('182','.otrariesgosQuimicos',$(this).val());});
    $('.otrariesgosBiologicos').hide();
    $("select[name=riesgosBiologicos]").change(function(){cualOpccion('188','.otrariesgosBiologicos',$(this).val());});
    $('.otrariesgosSociales').hide();
    $("select[name=riesgosSociales]").change(function(){cualOpccion('193','.otrariesgosSociales',$(this).val());});
  
    $('.otraviasAcceso').hide();
    $("select[name=viasAcceso]").change(function(){cualOpccion('199','.otraviasAcceso',$(this).val());});
    $('.otratransportePublico').hide();
    $("select[name=transportePublico]").change(function(){cualOpccion('204','.otratransportePublico',$(this).val());});
    $('.otrapresenciaVectores').hide();
    $("select[name=presenciaVectores]").change(function(){cualOpccion('255','.otrapresenciaVectores',$(this).val());});
    $('.otrapresenciaCentros').hide();
    $("select[name=presenciaCentros]").change(function(){cualOpccion('248','.otrapresenciaCentros',$(this).val());});


 

    $('.otrahijieneVivienda').hide();


 
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });



    $('input[name=noAplicaBarrio]').click(function(){ aplicaNomenclatura($(this).is(':checked') ,'nomenclaturaBarrio');});
    $('input[name=noAplicavereda]').click(function(){ aplicaNomenclatura($(this).is(':checked') ,'nomenclaturaVereda');});

    $('#animales').hide();
    $("select[name=animalesCasa]").change(function(){ VentaInOut($(this).val(),'1','#animales');});


    $('.animalesCasaTipo1').hide();
    $('#animalesCasaTipo1').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo1');});

    $('.animalesCasaTipo2').hide();
    $('#animalesCasaTipo2').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo2');});


    $('.animalesCasaTipo3').hide();
    $('#animalesCasaTipo3').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo3');});


    $('.animalesCasaTipo4').hide();
    $('#animalesCasaTipo4').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo4');});

    $('.animalesCasaTipo5').hide();
    $('#animalesCasaTipo5').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo5');});


    $('.animalesCasaTipo6').hide();
    $('#animalesCasaTipo6').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo6');});

    $('.animalesCasaTipo7').hide();
    $('#animalesCasaTipo7').click(function(){ otroCheck(   $(this).is(':checked') ,'.animalesCasaTipo7');});

  $('#buscar').keyup(function(){
    $('.buscar').html('')
    $.post('/ProyectoAPS/ficha_hogar/buscador',{
          id:$(this).val()
    },function(datos){
        datos = $.parseJSON(datos);
        
        for (var i = datos.length - 1; i >= 0; i--) {
            $('.buscar').append('<input class="bus" id="'+datos[i]['ID_BARRIO']+'"  value="'+datos[i]['DES_BARRIO']+'"  onclick=v(this.value,this.id,this)  onkeypress=v(this.value,this.id,this) readonly></input>')
        }
       
    })

    
  });


   }

function VentaInOut(valor_select,comparador,id){
  
             if (valor_select == comparador) {
                $(id).show();

            }else{
                $(id).hide();
            }
      }

   function otroCheck(check,clase){
      if (check) {
                $(clase).show();
      }else{
        $(clase).hide();
                $(clase+' > input').val("");
      }
    }
 

 function aplicaNomenclatura(check,clase){
    if (check) {
                $('.'+clase).hide();
                $('.'+clase+' > input').val("");
                $('input[name='+clase+']').prop('required',false);
      }else{
                $('.'+clase).show();
                $('.'+clase+' > input').val("");
                $('input[name='+clase+']').prop('required',true);
      }
 }

//$("input[name=buscar]").val();

  function zonasHogares(){
        if ($(this).attr('id')=='urbana') {
          $("select[name=nombreBarrio]").prop('required',true);
          $("input[name=buscar]").prop('required',true);
          $("input[name=nomenclaturaBarrio]").prop('required',true);


          $("select[name=nombreVereda]").prop('required',false);
          $("input[name=nomenclaturaVereda]").prop('required',false);
          $('#datosRural').hide();
          $('#datosUrbano').show();
      }else{

        $("select[name=nombreVereda]").prop('required',true);
        $("input[name=nomenclaturaVereda]").prop('required',true);

        $("input[name=codigo_barrio]").prop('required',false);
        $("input[name=nomenclaturaBarrio]").prop('required',false);
        $("input[name=buscar]").prop('required',false);
        $('#datosUrbano').hide();
          $('#datosRural').show();
      }

  }


   function agregarFamiliar(url){
      //$("#tabledatosHogar tbody tr:eq(0) ").clone().show().appendTo("#tabledatosHogar tbody");
                  //  $('#tabla-hogar tr:last').after('<tr><td><input name="codigo[]" placeholder="Codigo"  type="text" class="validate"></td><td><input name="nomApe[]" placeholder="Nombres y apellidos"  type="text" class="validate"></td><td><input name="dateNacimiento[]"placeholder="Fecha de nacimiento"  type="date" class="validate"></td><td><input name="edad[]"placeholder="Edad"  type="text" class="validate"></td><td><select class="browser-default" name="sexo[]"><option value="" disabled selected></option><option value="M">M</option><option value="F">F</option></select></td><td><select class="browser-default"  name="vinculacionJefe[]"><option value="" disabled selected></option><option value="285">1 | Jefe de hogar</option><option value="286">2 | Cónyuge</option><option value="287">3 | Madre</option><option value="288">4 | Padre</option><option value="289">5 | Hijo(a)</option> <option value="290">6 | Hermano(a)</option><option value="291">7 | Abuelos(as)</option><option value="292">8 | Sobrinos</option><option value="293">9 | Madrastra</option><option value="294">10 | Padrastro</option> <option value="295">11 | Otros parientes</option><option value="296">12 | Otros miembros no parientes</option></select>      </td></tr>');

$('#ts  > tr:last').after('<tr>'+
                                    '<td WIDTH="600"><input id="ficha_doc" name="docIdentidad[]" placeholder="Documento Identidad"  type="number" class="validate" required></td>'+
                                    '<td WIDTH="400"> '+ 
                                      '<select class="browser-default" name="tipoDoc[]" required>'+
                                        '<option value="" disabled selected>Tipo Documento</option>'+
                                        '<option value="Cedula de ciudadanía">1| Cedula de ciudadanía</option>'+
                                        '<option value="Tarjeta de identidad">2| Tarjeta de identidad</option>'+
                                        '<option value="Registro civil">3| Registro civil </option>'+
                                        '<option value="Cedula de extranjería">4| Cedula de extranjería </option>'+
                                      '</select>'+
                                    '</td>'+
                                    '<td WIDTH="600"><input  name="nomApe[]" class="name1" placeholder="Nombres"  type="text" class="validate" required></td>'+

                                    '<td WIDTH="600"><input  name="Apellido[]" placeholder="Apellidos"  type="text" class="validate" required></td>'+

                                    '<td WIDTH="400"><input id="dateNacimiento" class="datepicker" name="dateNacimiento[]" placeholder="Fecha de nacimiento"  type="date" class="validate" required></td>'+

                                    '<td WIDTH="300"><input class="edad" name="edad[]" placeholder="Edad" type="text"   class="validate"  required readonly></td>'+

                                    '<td WIDTH="400">  '+
                                     ' <select class="browser-default" name="sexo[]" required>'+
                                       ' <option value="" disabled selected>Genero</option>'+
                                        '<option value="M">1| Masculino</option>'+
                                        '<option value="F">2| Femenino</option>'+
                                      '</select>    '+
                                    '</td>'+

                                    '<td WIDTH="700">  <select class="browser-default"  name="vinculacionJefe[]" required>'+
                                     ' <option value="" disabled selected>Vinculación familiar con respecto al jefe del hogar</option>'+
                                      '<option value="285">1 | Jefe de hogar</option>'+
                                      '<option value="286">2 | Cónyuge</option>'+
                                      '<option value="287">3 | Madre</option>'+
                                      '<option value="288">4 | Padre</option>'+
                                      '<option value="289">5 | Hijo(a)</option>'+
                                      '<option value="290">6 | Hermano(a)</option>'+
                                      '<option value="291">7 | Abuelos(as)</option>'+
                                      '<option value="292">8 | Sobrinos</option>'+
                                      '<option value="293">9 | Madrastra</option>'+
                                      '<option value="294">10 | Padrastro</option>'+
                                      '<option value="295">11 | Otros parientes</option>'+
                                      '<option value="296">12 | Otros miembros no parientes</option>'+
                                    '</select>      '+
                                  '</td>'+
                                '</tr>');
 firma1();

$('#tablaSocioeconomica tr:last').after(
                              ''+
                               ' <tr>'+
                                 ' <td width="600"600 style="vertical-align:top;"><input readonly placeholder="Nombre" class="name2" type="text" class="validate"  name="nombres"></td>'+
                                  '<td width="600" style="vertical-align:top;">  '+
                                   ' <select class="browser-default" name="escolaridad[]" required>'+
                                    '  <option value="" disabled selected>Escolaridad</option>'+
                                     ' <option value="297">1 | No sabe leer ni escribir</option>'+
                                      '<option value="298">2 | Nunca fue a la escuela pero sabe leer y escribir</option>'+
                                      '<option value="300">4 | Primaria completa</option>'+
                                      '<option value="301">5 | Primaria incompleta</option>'+
                                      '<option value="302">6 | Secundaria completa</option>'+
                                      '<option value="303">7 | Secundaria incompleta</option>'+
                                      '<option value="304">8 | Técnico o Tecnológico</option>'+
                                      '<option value="305">9 | Universitario</option>'+
                                    '</select>      '+
                                  '</td>'+

                                  '<td width="600" style="vertical-align:top;">  <select class="browser-default" name="tipoOcupacion[]" required>'+
                                    '<option value="" disabled selected>Tipo</option>'+
                                    '<option value="306">1 | Agricultura</option>'+
                                    '<option value="307">2 | Minería</option>'+
                                    '<option value="308">3 | Ganadería</option>'+
                                    '<option value="309">4 | Pesca</option>'+
                                   ' <option value="310">5 | Oficios del hogar</option>'+
                                   ' <option value="311">6 | Estudiando</option>'+
                                   ' <option value="312">7 | Jubilado / Pensionado</option>'+
                                   ' <option value="313">8 | Empleado sector público</option>'+
                                   ' <option value="314">9 | Empleado sector privado</option>'+
                                    '<option value="315">10 | Prestador servicios técnicos, tecnológicos o profesionales</option>'+
                                  '  <option value="316">11 | No aplica por condición física o mental</option>'+
                                   ' <option value="317">12 | No aplica por edad</option>'+
                                   ' <option value="318">13 | Sin ocupación</option>'+
                                  '  <option value="319">14 | Otro</option>'+
                                 ' </select>'+
                                 ' <div class="input-fiel otratipoOcupacion">'+
                                 '   <input name="otratipoOcupacions[]" placeholder="¿Cuál?" type="text" class="validate">'+
                                 ' </div>'+
                               ' </td>'+

                               ' <td width="600" style="vertical-align:top;">  '+
                                '  <select class="browser-default" name="recivepago[]" required>'+
                                 '   <option value="" disabled selected>Recibe pago</option>'+
                                 '   <option value="320">1 | Si</option>'+
                                 '   <option value="321">2 | No</option>'+
                                 '   <option value="322">3 | No aplica</option>'+
                                 ' </select>      '+
                               ' </td>'+

                               ' <td width="600" style="vertical-align:top;">  '+
                                 ' <select class="browser-default" name="aportaHogar[]" required>'+
                                  '  <option value="" disabled selected>Aporta al hogar</option>'+
                                  '  <option value="323">1 | Si</option>'+
                                  '  <option value="324">2 | No</option>'+
                                  '  <option value="325">3 | No aplica</option>'+
                                 ' </select>      '+
                               ' </td>'+

                               ' <td width="600" style="vertical-align:top;">  '+
                                 ' <select class="browser-default bluOptions" name="regimen[]" >'+
                                   ' <option value="561" selected>Seleccione una opción </option>'+
                                   ' <option value="326">1 | Contributivo</option>'+
                                  '  <option value="327">2 | Subsidiado</option>'+
                                   ' <option value="328">3 | Población pobre no asegurada (Vinculado)</option>'+
                                   ' <option value="329">4 | Régimen especial</option>'+
                                   '<option  value="561">5 | No aplica</option>'+
                                 ' </select>      '+
                               ' </td >'+

                                '<td width="500" style="vertical-align:top;">  '+
                                 ' <select class="browser-default bluOptions" name="tipoVincuacion[]" >'+
                                   ' <option value="332" selected>Seleccione una opción </option>'+
                                   ' <option value="330">1 | Cotizante</option>'+
                                   ' <option value="331">2 | Beneficiario</option>'+
                                   ' <option value="332">3 | No aplica</option>'+
                                 ' </select>      '+
                               ' </td>'+

                               ' <td width="500" style="vertical-align:top;">'+
                                  '<select class="browser-default eps bluOptions" name="nomEps[]" >'+
                                   ' <option value="201" selected>Seleccione una EPS</option>'+
                                '  </select>'+
                               ' </td>'+
                
                             ' </tr>');

/*
$("#tabla-hogar tr").length
for (var i = ($("#tabla-hogar tr").length) - 1; i >= 0; i--) {
      $('#tabla-hogar tbody tr:eq('+i+') input').keyup(function(){


         $('#tablaSocioeconomica tbody tr:eq('+i+') input').val($(this).val());

    });

}


*/

  Eps(url);
      
  
 
$('#tabla-vulnerabilidad tr:last').after('<tr>'+
                                      '<td width="600" style="vertical-align:top;"><input readonly placeholder="Nombre" class="name3" type="text" class="validate"  name="nombres"></td>'+
                                

                                        '<td width="600" style="vertical-align:top;">'+
                                        '  <select class="browser-default" name="condicionDiscapacidad[]" required>'+
                                        '    <option value="" disabled selected>Condición discapacidad</option>'+
                                        '    <option value="339">1 | Motora</option>'+
                                         '   <option value="340">3 | Auditiva</option>'+
                                        '    <option value="341">4 | Visual</option>'+
                                        '    <option value="342">5 | Cognitiva o mental</option>'+
                                         '   <option value="537">6 | No aplica</option>'+
                                         '   <option value="343" >7 | Otros </option>'+
                                        '  </select>'+
                                         ' <div class="input-field col s12 otracondicionDiscapacidad ">'+
                                         '   <input name="otracondicionDiscapacidad[]" placeholder="¿Cuál?" type="text" class="validate">'+
                                        '  </div> '+
                                       ' </td>'+

                                       ' <td width="600" style="vertical-align:top;">'+
                                        '  <select class="browser-default" name="grupoEtnico[]" required>'+
                                         '   <option value="" disabled selected>Grupo étnico</option>'+
                                         '   <option value="344">1 | Indígena</option>'+
                                         '   <option value="345">2 | Afrodescendiente</option>'+
                                         '   <option value="346">3 | Mulato</option>'+
                                          '  <option value="347">4 | Gitano ROM</option>'+
                                         '   <option value="536">5 | No aplica</option>'+
                                          '  <option value="348">6 | Otros </option>'+
                                         ' </select>'+
                                         ' <div class="input-field otragrupoEtnico">'+
                                          '  <input name="otragrupoEtnico[]" placeholder="¿Cuál?" type="text" class="validate">'+
                                         ' </div>  '+
                                       ' </td>'+

                                       ' <td width="600" style="vertical-align:top;">'+
                                       '   <select class="browser-default" name="victimaConflicto[]" required>'+
                                        '    <option value="" disabled selected>Vinculación conflicto armado</option>'+
                                         '   <option value="349">1 | Víctima de desplazamiento forzado</option>'+
                                         '   <option value="350">2 | Víctima Herido o agredido en cualquier condición</option>'+
                                         '   <option value="351">3 | Víctima de familiares asesinados y/o desaparecidos</option>'+
                                         '   <option value="352">4 | Víctima despojada de tierras</option>'+
                                         '   <option value="353">5 | Víctimas amenazado(a)</option>'+
                                         '   <option value="354">6 | Desmovilizado(a) </option>'+
                                          '  <option value="355">7 | No aplica</option>'+
                                         ' </select></td>'+

                                         ' <td width="600" style="vertical-align:top;">'+
                                            '<select class="browser-default" name="poblacionLGBT[]" required>'+
                                            '  <option value="" disabled selected>Población LGBTI</option>'+
                                            '  <option value="356">1 | Lesbiana</option>'+
                                           '   <option value="357">2 | Gay</option>'+
                                            '  <option value="358">3 | Bisexual</option>'+
                                           '   <option value="359">4 | Transexual</option>'+
                                            '  <option value="360">5 | Intersexual</option>'+
                                            '  <option value="361">6 | Varias de las anteriores </option>'+
                                            '  <option value="362">7 | No aplica</option>'+
                                          '  </select></td>'+

                                           ' <td width="600" style="vertical-align:top;"><select class="browser-default bluOptions" name="adolecentesEmbarazadas[]" required>'+
                                            '  <option value="368" selected> Seleccione una opción </option>'+
                                            '  <option value="363">1 | Adolescente menor de 15 años embarazada sin control prenatal</option>'+
                                            '  <option value="364">2 | Adolescente menor de 15 años embarazada con control prenatal </option>'+
                                            '  <option value="365">3 | Adolescente entre 15 y 19 años embarazada sin control prenatal</option>'+
                                            '  <option value="366">4 | Adolescente entre 15 y 19 años embarazada con control prenatal</option>'+
                                            '  <option value="367">5 | Adolescente entre 15 y 19 años embarazada con control prenatal catalogada de alto riesgo</option>'+
                                            '  <option value="368" >6 | No aplica</option>'+
                                           ' </select></td>'+

                                           ' <td width="600" style="vertical-align:top;"><select class="browser-default bluOptions"  name="menorTrabajador[]" required>'+
                                           '   <option value="371" selected >Seleccione una opción </option>'+
                                             ' <option value="369">1 | Menor trabajador estudiando</option>'+
                                            '  <option value="370">2 | Menor trabajador que no está estudiando </option>'+
                                           '   <option value="371" >3 | No aplica</option>'+
                                           ' </select></td>'+

                                           ' <td width="600" style="vertical-align:top;"><select class="browser-default bluOptions" name="menoresDesercioescolar[]" required>'+
                                             ' <option value="378" selected >Seleccione una opción </option>'+
                                            '  <option value="372">1 | Desertor escolar por trabajar</option>'+
                                             ' <option value="373">2 | Desertor escolar por violencia escolar</option>'+
                                             ' <option value="374">3 | Desertor escolar por condiciones económicas</option>'+
                                            '  <option value="375">4 | Desertor escolar por desmotivación personal</option>'+
                                            '  <option value="376">5 | Desertor escolar por distancia al centro educativo</option>'+
                                            '  <option value="377">6 | Desertor escolar por otros motivos</option>'+
                                            '  <option value="378" >7 | No aplica</option>'+
                                         '   </select></td>'+
                                        '  </tr>');






$('#tabla-adiccionHigiene tr:last').after('<tr>'+
                                               '<td width="600"><input readonly placeholder="Nombre" class="name4" type="text" class="validate"  name="nombres"></td>'+
                                              ' <td width="600">'+
                                                 '<select class="browser-default" name="consumeAlcohol[]" required>'+
                                                 '  <option value="" disabled selected>Consumo de alcohol</option>'+
                                                 '  <option value="379">1 | Todos los días.</option>'+
                                                 '  <option value="380">2 | Entre 5 y 6 días por semana.</option>'+
                                                '   <option value="381">3 | Entre 3 y 4 días por semana</option>'+
                                                 '  <option value="382">4 | Entre 1 y 2 días por semana.</option>'+
                                                 '  <option value="383">5 | Entre 1 y 3 días por mes</option>'+
                                                 '  <option value="384">6 | Menos de una vez al mes</option>'+
                                                '   <option value="385">7 | No aplica</option>'+
                                              '   </select>'+

                                              ' </td>'+

                                              ' <td width="600"><select class="browser-default" name="consumeCigarrillo[]" required>'+
                                                ' <option value="" disabled selected>Consumo de cigarrillo</option>'+
                                                ' <option value="386">1 | Consume un cigarrillo diario.</option>'+
                                                ' <option value="387">2 | Consume más de un cigarrillo diario.</option>'+
                                                ' <option value="388">3 | Consume entre 1 y 6 cigarrillos en una semana corriente</option>'+
                                                ' <option value="389">4 | No consume cigarrillo</option>'+

                                              ' </select></td>'+

                                              ' <td width="600"><select class="browser-default" name="consumePsicoactivos[]" required onchange="mensageSelect(this.value)" >'+
                                                ' <option value="" disabled selected>Consumo de psicoactivos</option>'+
                                                ' <option value="390">1 | Consume psicoactivos entre 1 y más veces al día</option>'+
                                                ' <option value="391">2 | Consume psicoactivos con más de una vez en una semana corriente</option>'+
                                                ' <option value="392">3 | Consume psicoactivos menos de una vez en una semana corriente</option>'+
                                               '  <option value="393">4 | No consume psicoactivos</option>'+
                                             '  </select></td>'+

                                              ' <td width="600"><select class="browser-default" name="higieneCorporal[]" required>'+
                                                ' <option value="" disabled selected>Higiene corporal</option>'+
                                                ' <option value="394">1 | Se realiza el baño de su cuerpo 1 vez al mes</option>'+
                                                ' <option value="395">2 | Se realiza el baño de su cuerpo 1 vez a la semana</option>'+
                                                ' <option value="396">3 | Se realiza el baño de su cuerpo 2 veces a la semana</option>'+
                                                ' <option value="397">4 | Se realizan el baño de su cuerpo a diario.</option>'+
                                              ' </select></td>'+
                                               '<td width="600"><select class="browser-default" name="higieneBucal[]" required>'+
                                                ' <option value="" disabled selected>Higiene bucal</option>'+
                                                ' <option value="398">1 | Se lava los dientes al menos una vez al día con agua, crema y cepillo</option>'+
                                                ' <option value="399">2 | Se lava los dientes al menos dos veces al día con agua, crema y cepillo</option>'+

                                                 '<option value="400">3 | Se lava los dientes tres veces al día con agua, crema y cepillo</option>'+
                                                 '<option value="401">4 | Solo se enjuga con agua los dientes.</option>'+
                                                ' <option value="402">5 | No de lava los dientes.</option>            '+
                                              ' </select></td>'+
                                              ' <td width="600"><select class="browser-default" name="actividadFisica[]" required>'+
                                               ' <option value="" disabled selected>Actividad física</option>'+
                                                ' <option value="403">1 | No realiza</option>'+
                                                ' <option value="404">2 | 1 día a la semana</option>'+
                                                ' <option value="405">3 | 2 y 3 a la semana</option>'+
                                                ' <option value="406">4 | 4 y 5 a la semana</option>'+
                                               '  <option value="407">5 | 6 y 7 a la semana</option>'+
                                              ' </select></td>'+
                                               '<td width="600"><select class="browser-default bluOptions" name="mujerGestacion[]" required>'+
                                                 '<option value="414" selected>Seleccione un opción </option>'+
                                                ' <option value="412">1 | Mujer en gestación con control prenatal</option>'+
                                                ' <option value="413">2 | Mujer en gestación sin control prenatal</option>'+
                                               '  <option value="414">3 | No aplica</option>'+
                                              ' </select></td>'+
                                             ' <td  width="600">'+
                                            ' <select class="browser-default"  name="efermedadCardioVacular[]" required>'+
                                                     '    <option value="" disabled  selected>Diabetes e Hipertencion</option>'+
                                                    ' <option value="538">1 | Diabetes</option>'+
                                                   '  <option value="539">2 | Hipertensión </option>'+
                                                    ' <option value="540">3 | Diabetes e Hipertensión.</option>'+
                                                      ' <option value="541" >4 | No aplica.</option>     '+
                                            ' </select></td>'+
                                            ' </tr>');


   
  $('.datepicker').pickadate({
    selectYears: 200 , 
    selectMonths: true,
    monthsFull: [ 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre' ],
    monthsShort: [ 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic' ],
    weekdaysFull: [ 'domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado' ],
    weekdaysShort: [ 'dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb' ],
    weekdaysLetter:["D","L","M","M","J","V","S"],
    today: '',
    clear: 'borrar',
    close: 'cerrar',
    firstDay: 1,
    format: 'd/mm/yyyy',
    min: new Date(1900,01,01),
    max: new Date()
  


  });  


for (var i = ($("#ts > tr").length) - 1; i >= 0; i--) {
             console.log(i);
             repetirNombre(i);
             otroOpccionInvividual(i);
             fechaNacimiento(i);
             repetir(i);
}



}

var fechaActual = new Date();
function fechaNacimiento(i){

$(' #ts > tr:eq('+i+') input[name="dateNacimiento[]"]').change(function(){ 

$(this).css(  "box-shadow" , "2px 2px 1px #4CAF50" );
$(this).css(  "background-color" , "white" );
var myDate = new Date();
arreglo = $(this).val().split('/');
var ano =arreglo[2];
var mes =arreglo[1];
var dia =arreglo[0];


x=edad(ano,mes,dia);
anos=x.split(' ');


if ((anos[1] == 'Años' && anos[0] <= 18 ) || anos[1]== 'Meses' || anos[1]=='Dias') {


 
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menorTrabajador[]"]').show();
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menoresDesercioescolar[]"]').show();
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menorTrabajador[]"]').prop('required',true);
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menoresDesercioescolar[]"]').prop('required',true);
} 
else{
    $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menorTrabajador[]"]').hide();
      $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menoresDesercioescolar[]"]').hide();
      $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menorTrabajador[]"]').prop('required',false);
      $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="menoresDesercioescolar[]"]').prop('required',false);

}

if((anos[1] == 'Años') && (anos[0] >= 15  && anos[0] <= 19) ){
    $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').show();
      $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').prop('required',true);
}else{
    $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').hide();
      $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').prop('required',false);
}

if ($(' #ts > tr:eq('+i+') select[name="sexo[]"]').val() == 'M') {
    $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').hide();
      $('#tabla-adiccionHigiene tbody tr:eq('+i+') select[name="mujerGestacion[]"]').prop('required',false);
}



                $('#ts > tr:eq('+(i)+') .edad ').val(x);
});

}

       
   function repetirNombre($dato){
      $('#ts > tr:eq('+$dato+') .name1').keyup(function(){
      $('#tablaSocioeconomica tbody tr:eq('+$dato+') .name2').val($(this).val());
      $('#tabla-vulnerabilidad tbody tr:eq('+$dato+') .name3').val($(this).val());
      $('#tabla-adiccionHigiene tbody tr:eq('+$dato+') .name4').val($(this).val());});
   }

   function repetir(i){
$(' #ts > tr:eq('+i+') select[name="sexo[]"]').change(function(){ 
   if ($(this).val() == 'M') {
   $('#tabla-adiccionHigiene tbody tr:eq('+i+') select[name="mujerGestacion[]"]').hide();
   $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').hide();
   $('#tabla-adiccionHigiene tbody tr:eq('+i+') select[name="mujerGestacion[]"]').prop('required',false);
   $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').prop('required',false);


   }else{
   $('#tabla-adiccionHigiene tbody tr:eq('+i+') select[name="mujerGestacion[]"]').show();
   $('#tabla-adiccionHigiene tbody tr:eq('+i+') select[name="mujerGestacion[]"]').prop('required',true);
   $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').show();
   $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').prop('required',true);
  var anos=$(' #ts > tr:eq('+i+') input[name="edad[]"]').val().split(' ');
  
   if((anos[1] == 'Años') && (anos[0] >= 15  && anos[0] <= 19) ){
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').show();
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').prop('required',true);
   }else{
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').hide();
       $('#tabla-vulnerabilidad  tbody tr:eq('+i+') select[name="adolecentesEmbarazadas[]"]').prop('required',false);
   }
   }
});


   }

   function otroOpccionInvividual($dato){
     $('.otratipoOcupacion').hide();
     $("#tablaSocioeconomica  tbody tr:eq("+$dato+") select[name='tipoOcupacion[]']").change(function(){
                 cualOpccion2('319','.otratipoOcupacion ',$(this).val(),'#tablaSocioeconomica  tbody tr:eq('+$dato+')');});

     $('.otracondicionDiscapacidad').hide();
     $("#tabla-vulnerabilidad  tbody tr:eq("+$dato+") select[name='condicionDiscapacidad[]']").change(function(){
                 cualOpccion2('343','.otracondicionDiscapacidad ',$(this).val(),'#tabla-vulnerabilidad tbody tr:eq('+$dato+')');});


     $('.otragrupoEtnico').hide();
     $("#tabla-vulnerabilidad  tbody tr:eq("+$dato+") select[name='grupoEtnico[]']").change(function(){
                 cualOpccion2('348','.otragrupoEtnico ',$(this).val(),'#tabla-vulnerabilidad  tbody tr:eq('+$dato+')');});

    
 $('#tabla-adiccionHigiene tbody tr:eq('+$dato+') select[name="consumePsicoactivos[]"] ').change(function(){
          if ($(this).val() !='393') {
             Materialize.toast('ATENCION: Brindar valoración por psicología', 7000);
        }
         
         
     });

   }

function  ActivarBotonGuardar(){
  if ($( "#create_account" ).prop({disabled: true})) {

      $( "#create_account" ).prop( "disabled", false );

  }else{
     $( "#create_account" ).prop( "disabled", true );
  }

} 


 function eliminarFamiliar(){
  //alert(($("#ts tr").length));
 if (($("#ts tr").length) > 8) {
  $('#ts  > tr:last').remove();
  $('#tablaSocioeconomica tr:last').remove();
  $('#tabla-adiccionHigiene tr:last').remove();
  $('#tabla-vulnerabilidad tr:last').remove();
  }else{
    alert('No puede eliminar mas familires');
  }

 }
   
   function cualOpccion2(comparador,clase,valor_select,tabla){
       if (valor_select == comparador) {
                $(tabla+" "+clase).show();

            }else{
                $(tabla+" "+clase).hide();
                $(tabla+" "+clase+' > input').val("");
            }
    }

   function cualOpccion(comparador,clase,valor_select){
       if (valor_select == comparador) {
                $(clase).show();

            }else{
                $(clase).hide();
                $(clase+' > input').val("");
            }
    }


   function  Eps(dato){

       $.post(dato,{
              },function(datos){  
                 datos = $.parseJSON(datos);
                 for (var i = datos.length - 1; i >= 0; i--) {
                   $('.eps option:last').after('<option value="'+datos[i]['ID_EPS']+'" >'+datos[i]['DES_EPS']+'</option>');
                   $('select').not('.disabled').material_select();
                      }     
             
               
      }); 

   }

$("input[name=buscar]").removeData();
   
  function v(val,id,x){
     
  
    if (val != 'buscar') {
     $('input[name=buscar]').val(val);
     $('input[name=codigo_barrio]').val(id);
     $('.buscar').html('');
     
     //$("#codigo_hogar").val();
     var municipio = $("input[name=codigo_municipio]").val();
     Identidad=$('#ficha_doc').val();
     $("#codigo_hogar").val(municipio+id+'-'+Identidad); 
    }

  
        
  }


function validarFaltantes(){
  var val='';
    
      
      if ($('select[name=municipio] option:selected').val() == '') {val=val+'preg2 -';}
      if ($('select[name=tipoHogar] option:selected').val() == '') {val=val+'preg4 -';}
      if ($('select[name=jefeHogar] option:selected').val() == '') {val=val+'preg5 -';}
      if ($('input[name=telefono_jefe_hogar]').val() == '') { val=val+'preg6 -';}
      if (!$('input[name=ubicacion]').is(':checked')) { val=val+'(preg 8 o preg 9) -';}
  
      if ($('input:radio[name=ubicacion]:checked').val() == '1') {
      if ($('input[name=buscar]').val() == '') { val=val+'preg10 -';}
      if ($('#noAplicaBarrio').prop('checked')){}else{ if ($('input[name=nomenclaturaBarrio]').val() == '') { val=val+'preg12 -';}}}
      else{
      if ($('select[name=nombreVereda] option:selected').val() == '') { val=val+'preg14 -';}
      if ($('#noAplicavereda').prop('checked')){}else{ if ($('input[name=nomenclaturaVereda]').val() == '') { val=val+'preg16 -';}}
      }


      $($('input[name="docIdentidad[]"]')).each(function( index ) {if ($(this).val()== '') { val=val+'preg18 -';} }); 
      $($('select[name="tipoDoc[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg19 -';} });
      $($('input[name="nomApe[]"]')).each(function( index ) {if ($(this).val()== '') { val=val+'preg20 -';} }); 
      $($('input[name="Apellido[]"]')).each(function( index ) {if ($(this).val()== '') { val=val+'preg21 -';} });
      $($('input[name="dateNacimiento[]"]')).each(function( index ) {if ($(this).val()== '') { val=val+'preg22 -';} });  
      $($('input[name="edad[]"]')).each(function( index ) {if ($(this).val()== '') { val=val+'preg23 -';} });
      $($('select[name="sexo[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg24 -';} }); 
      $($('select[name="vinculacionJefe[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg25 -';} });  
     

      $($('select[name="escolaridad[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg26 -';} });
      $($('select[name="tipoOcupacion[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg27 -';} });  
      $($('select[name="recivepago[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg28 -';} });  
      $($('select[name="aportaHogar[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg29 -';} }); 


      $($('select[name="condicionDiscapacidad[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg33 -';} });
      $($('select[name="grupoEtnico[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg34 -';} });
      $($('select[name="victimaConflicto[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg35 -';} });
      $($('select[name="poblacionLGBT[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg36 -';} });
      
      $($('select[name="consumeAlcohol[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg41 -';} }); 
      $($('select[name="consumeCigarrillo[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg42 -';} }); 
      $($('select[name="consumePsicoactivos[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg43 -';} }); 
      $($('select[name="higieneCorporal[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg44 -';} }); 
      $($('select[name="higieneBucal[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg45 -';} }); 
      $($('select[name="actividadFisica[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg46 -';} }); 
      $($('select[name="efermedadCardioVacular[]"] option:selected')).each(function( index ) {if ($(this).val()== '') { val=val+'preg48 -';} }); 


       if ($('select[name=tenenciaVivienda] option:selected').val() == '') { val=val+'preg49 -';}
       if ($('select[name=zonaVivienda] option:selected').val() == '') { val=val+'preg50 -';}
       if ($('select[name=tipoVivienda] option:selected').val() == '') { val=val+'preg51 -';}
       if ($('select[name=materialTecho] option:selected').val() == '') { val=val+'preg52 -';}
       if ($('select[name=materialParedes] option:selected').val() == '') { val=val+'preg53 -';}
       if ($('select[name=materialPiso] option:selected').val() == '') { val=val+'preg54 -';}
       if ($('select[name=abastecimientoFuente] option:selected').val() == '') { val=val+'preg55 -';}
       if ($('select[name=abastecimientoTratamiento] option:selected').val() == '') { val=val+'preg56 -';}
       if ($('select[name=abastecimientoAlmacenamiento] option:selected').val() == '') { val=val+'preg57 -';}
       if ($('select[name=disposicionMecanismo] option:selected').val() == '') { val=val+'preg58 -';}
       if ($('select[name=disposicionDispocicion] option:selected').val() == '') { val=val+'preg59 -';}
       if ($('select[name=disposicionRecolecion] option:selected').val() == '') { val=val+'preg60 -';}
       if ($('select[name=disposicionDisposicionbasuras] option:selected').val() == '') { val=val+'preg61 -';}
       if ($('select[name=Energia] option:selected').val() == '') { val=val+'preg62 -';}
       if ($('select[name=Combustible] option:selected').val() == '') { val=val+'preg63 -';}
       if ($('select[name=cocinaSeparada] option:selected').val() == '') { val=val+'preg64 -';}
       if ($('input[name=numDormitorios]').val() == '') { val=val+'preg65 -';}
       if ($('input[name=numPersonaDormitorio]').val() == '') { val=val+'preg66 -';}
       if ($('select[name=riegosFisicos] option:selected').val() == '') { val=val+'preg67 -';}
       if ($('select[name=riesgosQuimicos] option:selected').val() == '') { val=val+'preg68 -';}
       if ($('select[name=riesgosBiologicos] option:selected').val() == '') { val=val+'preg69 -';}
       if ($('select[name=riesgosSociales] option:selected').val() == '') { val=val+'preg70 -';}
       if ($('select[name=viasAcceso] option:selected').val() == '') { val=val+'preg72 -';}
       if ($('select[name=transportePublico] option:selected').val() == '') { val=val+'preg73 -';}
       if ($('select[name=telefono_publico] option:selected').val() == '') { val=val+'preg74 -';}
       if ($('select[name=hogares_infantiles] option:selected').val() == '') { val=val+'preg75 -';}
       if ($('select[name=ecuelas] option:selected').val() == '') { val=val+'preg76 -';}
       if ($('select[name=centroSalud] option:selected').val() == '') { val=val+'preg77 -';}
       if ($('select[name=bomberos] option:selected').val() == '') { val=val+'preg78 -';}
       if ($('select[name=comisariaFamilia] option:selected').val() == '') { val=val+'preg79 -';}
       if ($('select[name=centroReligioso] option:selected').val() == '') { val=val+'preg80 -';}
       if ($('select[name=centroDeportivo] option:selected').val() == '') { val=val+'preg81 -';}
       if ($('select[name=centroCultural] option:selected').val() == '') { val=val+'preg82 -';}
       if ($('select[name=mercadoBasico] option:selected').val() == '') { val=val+'preg83 -';}
       if ($('select[name=presenciaVectores] option:selected').val() == '') { val=val+'preg84 -';}
       if ($('select[name=presenciaCentros] option:selected').val() == '') { val=val+'preg85 -';}
       if ($('select[name=convivencia] option:selected').val() == '') { val=val+'preg88 -';}
       if ($('select[name=hijieneVivienda] option:selected').val() == '') { val=val+'preg89 -';}
       if ($('select[name=riesgosLaborales] option:selected').val() == '') { val=val+'preg90 -';}
       if ($('select[name=consumoAlimentos] option:selected').val() == '') { val=val+'preg91 -';}
       if ($('select[name=animalesCasa] option:selected').val() == '') { val=val+'preg92 -';}
       if ($('select[name=menoresEsquemaincompleto] option:selected').val() == '') { val=val+'preg101 -';}
       if ($('select[name=adultosEnfermedadcronica] option:selected').val() == '') { val=val+'preg102 -';}
       if ($('select[name=miembrosSincontrolsexual] option:selected').val() == '') { val=val+'preg103 -';}
       if ($('select[name=alteracionesNutricionales] option:selected').val() == '') { val=val+'preg104 -';}
       if ($('select[name=consultaPorEnfermedad] option:selected').val() == '') { val=val+'preg105 -';}
       if ($('select[name=lesionesPiel] option:selected').val() == '') { val=val+'preg106 -';}
       if ($('select[name=violenciaMiembros] option:selected').val() == '') { val=val+'preg107 -';}
       if ($('select[name=sinControlbucal] option:selected').val() == '') { val=val+'preg108 -';}
       if ($('select[name=sinAsistenciamedico] option:selected').val() == '') { val=val+'preg109 -';}
       if ($('select[name=miembroFirma] option:selected').val() == '') { val=val+'preg111 ';}

      
     return val;
}



  
