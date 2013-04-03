$(function() 
{
    $( "#tabs" ).tabs();
});

function addtcase(obj)
{
    if(obj.count==null)
    {
        obj.count = 1;
    }
    else
    {
        obj.count++;
    }
    var old = $('#tcasebox').html();
    old += '<div>Input:<input type="file" name="tcaseinput'+obj.count+'" />Output:<input type="file" name="tcaseoutput'+obj.count+'" /><button name="cross" onclick="return removediv(this);" >X</button></div>';
    $('#tcasebox').html(old);
    return false;
}

function removediv(obj)
{
    var par = obj.parentNode;
    par.parentNode.removeChild(par);
    return false;
}

function validate()
{
    var errstr = "";
    var errflag = 0;
    if($('#code').val()=="")
    {
        errflag = 1;
        errstr += "Code is not filled\n";
    }
    else
    {
        $('#code').val($('#code').val().toUpperCase());
    }
    if(document.getElementById('add').count!=null)
        $('#hidden').val(document.getElementById('add').count);
    else
        $('#hidden').val(0);
    if(errflag == 1)
    {
        alert(errstr);
        return false;
    }
    
    return true;
}