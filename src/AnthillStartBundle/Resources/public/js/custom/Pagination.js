/**
 * Created by kostya on 24.09.15.
 */
(function( $ ) {
    $.widget( "custom.pagination", {

        // These options will be used as defaults
        options: {
            facet:{

            },
            onselect:function(){}
        },

        _create: function() {
            console.log(this.options);
            this._bind();
        },

        _bind:function(){
            var self = this;
            $(this.element).on('click','.pagination a',function(e){
                e.preventDefault();
                self._send($(this), self);
                history.pushState(null, null, $(this).attr('href'));
            });
            $(window).bind('popstate',function(e){
                location.href = location.href;
            });
        },

        // !!!!!!переписать шаблон пагинации так, что бы url на странице был с ajax!!!!!!!!
        _send:function( pag, elem){
            datafaset = elem._getData(pag,elem);
            $.getJSON( 'ajax/',datafaset, function( data ) {
                $('.tenders_list').html(data.page);
            });
            elem.options.onselect();
        },
        
        _getData:function(pag){
            var qs=pag.attr('href').split('?');
            qs = qs[1];
            var A=qs.split("&");
            var B=null;
            var Page = {};
            for (var j=0;j<A.length;j++){
                B=A[j].split("=");
                Page[B[0]]=B[1];
            }
            console.log(Page);
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
