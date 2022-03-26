let calculation ={
    investValue: 0,
    marketValueBuy: 0,
    coinAmount: 0,
    cCoins(){
        this.coinAmount = (this.investValue / this.marketValueBuy).toFixed(8);
        return this.coinAmount
    },    
    marketValueSell: 0,
    valueChange:{
        percent: 0,
        currency: 0,
    },    
    cValueChangeCur(){
        this.valueChange.currency = (this.marketValueSell - this.marketValueBuy).toFixed(2);     
        return this.valueChange.currency;
    },
    cValueChangePer(){
        if(this.marketValueBuy > this.marketValueSell){ //decrease
            this.valueChange.percent = "-" + ((this.marketValueBuy - this.marketValueSell) / this.marketValueBuy * 100).toFixed(2);
        }else{ //increase
            this.valueChange.percent = ((this.marketValueSell - this.marketValueBuy) / this.marketValueBuy * 100).toFixed(2);
        }        
        return this.valueChange.percent;
    },
    revenue: 0,
    cRevenue(){
        this.revenue = ((this.coinAmount * this.marketValueSell) - this.investValue).toFixed(2) + " €";
        return this.revenue
    }   
};

//wird bei eingabe aufgerufen
function calculate(c){
    c.investValue = $('#investValue').val();
    c.marketValueBuy = $('#marketValueBuy').val();
    c.marketValueSell = $('#marketValueSell').val();

    // coin amount
    // wenn inputs Investition und Marktwert bei Kauf leer sind
    if(c.investValue.length == 0 || c.marketValueBuy.length == 0){
        $('#coinAmount').html('0.00000000');
    }else{        
        $('#coinAmount').html(c.cCoins());
    }

    // revenue
    // wenn inputs Menge und Marktwert bei Verkauf leer sind
    if(c.coinAmount.length == 0 || c.marketValueSell.length == 0 || c.investValue.length == 0 || c.marketValueBuy.length == 0){
        $('#revenue').html('0 €');
    }else{        
        $('#valueChangeCurrency').html(c.cValueChangeCur());
        $('#valueChangePercent').html(c.cValueChangePer());
        $('#revenue').html(c.cRevenue());
    }
}
