/*
 * ! делаем замыкание - это нужно для того чтобы не перезаписать глобальные переменные
 * по простому это безимянная функция которая вызывает саму себя
 * (function ($) {  })(jQuery);
 * 
 * если записать по простому:
 * 
 * function build ($) {};
 * build(jQuery);
 * 
 */
(function ($) {

	"use strict";

	/*
	 * ! ждем пока загрузится все на странице
	 * это короткая запись такого вот этого
	 * $(document).ready(function () { });
	 * 
	 * ! но в документации рекомнендуется использовать записть как я привел ниже
	 * 
	 * 	$(function () { });
	 * 
	 */
	$(function () {

		var $content = $('.js-table-ajax-content');
		var $pages = $('.js-table-ajax-page');
		var $table = $('.js-table-ajax');

		var ajaxApp = function (page, call) {

			$table.addClass('loading');
			$content.empty();

			$.ajax({
				url: 'back.php',
				dataType: 'json',
				data: {
					page: page
				},
				success: function (data) {
					showTableContent(data);
					$table.removeClass('loading');

					if (call) {
						call(data);
					}

					console.log('return server', data);
				}
			})
		};

		var showTableContent = function (data) {

			var $rows = $('');
			for (var i = 0; i < data.length; i++) {
				var row = data[i];
				$rows = $rows.add(createRow(row));
			}

			$content.html($rows);
		};

		var createRow = function (row) {
			var $row = $('<tr>');
			$row.append(
				$('<td>', {text: row.bookID}),
				$('<td>', {text: row.bookTitle}),
				$('<td>', {text: row.bookDes}),
				$('<td>', {text: row.bookPrice})
			);

			return $row;
		};

		$pages.on('click', function () {
			var $this = $(this);
			var page = $this.data('page');
			$pages.removeClass('pure-button-active').attr('disabled', 'disabled');
			$this.addClass('pure-button-active');
			ajaxApp(page, function (data) {
				console.log('do same', data);
			});
		});

		var $author = $('#select-author');

		$.ajax({
			url: 'author.php',
			dataType: 'json',
			success: function (data) {
				for (var key = 0; key < data.length; key++) {
					var author = data[key];
					var $option = $('<option>', {
						value: author.autorID,
						text: author.autorName
					});
					$author.append($option);
				}

			}
		});

		var $janre = $('#select-janre');

		$author.on('change', function () {
			var author_id = $author.val();

			var $option = $janre.find('option:first');
			$janre.empty();
			$janre.append($option);

			if (!author_id) {
				return;
			}
			$.ajax({
				url: 'janre_by_author.php',
				dataType: 'json',
				data: {
					autorID: author_id
				},
				success: function (data) {
					for (var key = 0; key < data.length; key++) {
						var author = data[key];
						var $option = $('<option>', {
							value: author.janreID,
							text: author.janreName
						});
						$janre.append($option);
					}
				}
			})
		});


		var $search = $('#btn_search');

		$search.on('click', function () {
		    var author_id = $author.val();
		    var janre_id = $janre.val();

			$content.empty();

			if (!author_id) {
		        return;
		    }

			$.ajax({
			    url: 'books.php',
			    dataType: 'json',
			    data: {
				    autorID: author_id,
				    janreID: janre_id
			    },
			    success: function (data) {
				    showTableContent(data);
			    }
		    })
		    
		});

		// $pages.first().trigger('click');

	});


})(jQuery);
