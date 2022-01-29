#include <stdio.h>

/*	-------------------------------------------------------------------------------------------------------  */
/*  							      Penjelasan Fungsi gets() & puts()						                 */
/*	-------------------------------------------------------------------------------------------------------  */
/*  Fungsi char *gets(char *s) membaca sebuah baris atau string dari stdin (keyboard) ke buffer  			 */
/*	-------------------------------------------------------------------------------------------------------	 */
/*  Fungsi int puts(const char *s) menampilkan/menaruh string yang sudah didapatkan kepada stdout (layar).	 */
/*	-------------------------------------------------------------------------------------------------------	 */	

int main( ) {

   char str[100];

   printf( "Enter a value :");
   gets( str );

   printf( "\nYou entered: ");
   puts( str );

   return 0;
}