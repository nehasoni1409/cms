$(document).ready(function(){
    $('#selectAllBoxes').click(function(){
        if(this.checked)
        {
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }
        else
        {
            $('.checkboxes').each(function(){
                this.checked = false;
            });
        }
    })
});
