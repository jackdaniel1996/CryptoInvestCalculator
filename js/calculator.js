let calculation = new Object();
function calculate(){
    calculation.investValue = $('#investValue').val();
    calculation.marketValue = $('#marketValue').val();

    if(calculation.investValue.length == 0 || calculation.marketValue.length == 0){
        $('#coinAmount').html('0.00000000');
    }else{
        $('#coinAmount').html((calculation.investValue / calculation.marketValue).toFixed(8));
    }
}