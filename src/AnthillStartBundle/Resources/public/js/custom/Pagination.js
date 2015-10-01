/**
 * Created by kostya on 24.09.15.
 */
(function( $ ) {
    $.widget( "custom.pagination", {

        // These options will be used as defaults
        options: {
            facet:'#facet',
            shortUrl:'ajax/',
            paginator:'.pagination a',
            onselect:function(self,page){}
        },

        _create: function() {
            this._bind();
        },

        _bind:function(){
            var self = this;
            $(this.element).on('submit',self.options.facet,function(e){
                e.preventDefault();
                self._sendForSubmit(self);
            });
            $(self).on('onselect',self.options.onselect);
            $(this.element).on('click',self.options.paginator,function(e){
                e.preventDefault();
                self._sendForPage($(this), self);
                $( self ).trigger('onselect',[self,$(this)]);
            });
            $(window).bind('popstate',function(e){
                location.href = location.href;
            });
        },

        _sendForSubmit: function( elem){
            var datafaset = elem._getFacetData($(elem.options.facet));
            var data = {};
            for( var i in datafaset){
                data[i] =  datafaset[i];
            }
            elem._send(elem.options.shortUrl, data);
        },

        _sendForPage:function(page, elem){
            var data={};
            var url = page.attr('href');
            var arr = url.split('?');
            url = elem.options.shortUrl+'?'+arr[1];
            elem._send(url, data);

        },

        _send:function(ajax_url,data){
            $.getJSON(ajax_url,data, function( data) {
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
