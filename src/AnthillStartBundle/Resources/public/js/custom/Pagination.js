/**
 * Created by kostya on 24.09.15.
 */
(function( $ ) {
    $.widget( "custom.pagination", {

        // These options will be used as defaults
        options: {
            facet:'#facet',
            onselect:function(){}
        },

        _create: function() {
            this._bind();
        },

        _bind:function(){
            var self = this;
            $(this.element).on('submit',self.options.facet,function(e){
                e.preventDefault();
                self._send(false, self);
            });
            $(this.element).on('click','.pagination a',function(e){
                e.preventDefault();
                self._send($(this), self);
            });
            $(window).bind('popstate',function(e){
                location.href = location.href;
            });
        },

        _send: function( ispaginator, elem){
            datafaset = elem._getFacetData($(elem.options.facet));
            var data = {};
            if(ispaginator != false){
                data['page'] = elem._getPage(ispaginator);
            }
            for( var i in datafaset){
                data[i] =  datafaset[i];
            }

            $.getJSON( 'ajax/',data, function( data) {
                $('.tenders_list').html(data.page);
            }).always(function(){
                var arr = this.url.split('?');
                if(arr[1] == null){
                    arr[1] = '';
                }
                var url = location.pathname +"?"+arr[1];
                history.pushState(null, null, url);
            });
        },

        _getPage:function(pag){
            var result = {};
            var qs = pag.attr('href').split('?');
            qs = qs[1];
            var A = qs.split("&");
            var B = null;
            var page = 1;
            for (var j = 0;j < A.length;j++){
                B=A[j].split("=");
                if(B[0] == "page"){
                    page = B[1];
                }
            }
            return page;
        },

        _getFacetData: function(bl){
            var result = {};
            bl.find('[type=radio]:checked').each(function(i){
                result[$(this).attr('name')] =  $(this).val();
            });
            bl.find('[type=checkbox]:checked').each(function(i){
                if(result[$(this).attr('name')] == null){
                    result[$(this).attr('name')] = [];
                }
                result[$(this).attr('name')].push($(this).val());
            });
            bl.find('[type=text]').each(function(){
                if($(this).val().trim() != ""){
                    result[$(this).attr('name')] = $(this).val();
                }
            });
            return result;
        },

        _setOption: function( key, value ) {
            switch( key ) {
                //case "clear":
                //    break;
            }
            $.Widget.prototype._setOption.apply( this, arguments );
            this._super( "_setOption", key, value);
        },

        destroy: function() {
            $.Widget.prototype.destroy.call( this );
        }
    });
}( jQuery ) );
