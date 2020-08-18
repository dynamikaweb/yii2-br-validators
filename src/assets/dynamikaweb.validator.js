var dynamikaweb = (typeof dynamikaweb == "undefined" || !dynamikaweb)? {} : dynamikaweb;

dynamikaweb.validation = (function($) {
  var pub = {
    isEmpty: function(value) {
      return value === null || value === undefined || value == [] || value === '';
    },
    addMessage: function(messages, message, value) {
        messages.push(message.replace(/\{value\}/g, value));
    },
    isAllCharEquals: function(string) {
        var c = string.charAt(0);
        for (var i in string) {
            if (c != string.charAt(i)) {
                return false;
            }
        }
        return true;
    },
    titulo: function(value, messages, options) {
      if (options.skipOnEmpty && pub.isEmpty(value)) {
          return;
      }

      var valid = true;
      var titulo = value.replace(/[^0-9_]/g, "");
      var uf = titulo.substr(-4, 2);
      var tam = titulo.length;

      if((uf < 1 || uf > 28) || (tam < 5 || tam > 13)){
        valid = false;
      } else {
        for (var x = 0; x < 10; x++) {
          if (titulo === x.toString().repeat(10)) {
            valid = false;
          }
        }
      }

      if (valid) {
        var dv = titulo.substr(titulo.length - 2, 2);
        var sequencia = titulo.substr(0, titulo.length - 4);
        var base = 2;
        for (var i = 0; i < 2; i++) {
          var fator = 9;
          var soma = 0;

          for (var j = (sequencia.length -1); j > -1 ; j--) {
            soma += sequencia.charAt(j) * fator;
            
            if (fator == base) {
              fator = 10;
            }

            fator--;
          }

          var digito = soma % 11;
  
          if (digito == 0 && uf < 3){
            digito = 1;
          } else if (digito == 10) {
            digito = 0;
          }

          if (dv.charAt(i) != digito) {
            valid = false;
          }

          switch (i) {
            case 0:
              sequencia = uf.toString() + digito.toString();
              break
          } 
        }
      }
      if (!valid) {
          pub.addMessage(messages, options.message, value);
      }
    },
  };
  return pub;
})(jQuery);
  