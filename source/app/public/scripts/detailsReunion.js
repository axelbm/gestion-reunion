
$(document).ready(function(){

    $(".btn-link").click(function(event) {
        // Stop the browser from submitting the form.
        
    event.preventDefault();
        var formData = $("#suppressionParticipant").serializeArray();
        
        data = {
            formid: formData[0].value,
            reunionid: formData[1].value,
            courriel: $(this).val(),
            ajax: 1
        }

        console.log(data);

        button = this;

        $.ajax({
            type: 'POST',
            url: $("#suppressionParticipant").attr('action'),
            data: data,
            success: (data) => {
                console.log(data)
                data = JSON.parse(data);

                if (data.valid) {
                    $(button).parent().remove();

                    $("input[value='"+data.formid+"']").val(data.newFormid)
                    
                    alert(data.nom + " à bien été retiré des participations.")
                }
            }
        })
        
    });
});