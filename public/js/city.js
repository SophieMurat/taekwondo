$(function (){
    let zipcode =$('#zipcode');
    let url ='https://geo.api.gouv.fr/communes?codePostal=';
    let city =$('#city');
    let errorMessage = $('#error-message'); 
    $(zipcode).on('blur', function(){
        let code =$(this).val();
        console.log(code);
        $.ajax({
            type: 'GET',
            url:url+code+'&format=json',
            success: function(data) {
                console.log('success', data)
                console.log(data.length);
                $(city).find('option').remove();
                if(data.length){
                    $(errorMessage).text('').hide();
                    $.each(data, function(){
                        $(city).append('<option value="'+this.nom+'">'+this.nom+'</option>');
                    })
                }
                else{
                    if($(zipcode).val()){
                        $(errorMessage).text('Veuillez rentrer un code postal valide').show();
                    }
                    else{
                        $(errorMessage).text('').hide();
                    }
                }
            }
        });
    });
});