#include <stdio.h>

/*	-------------------------------------------------------------------------------------------------------  */
/*  							  Penjelasan Fungsi getchar() & putchar()						             */
/*	-------------------------------------------------------------------------------------------------------  */
/*  Fungsi int getchar(void) membaca karakter selanjutnya yang ada dan dikembalikan sebagai sebuah integer.  */
/*  Fungsi ini membaca hanya sebuah karakter pada satu waktu.												 */
/*	-------------------------------------------------------------------------------------------------------	 */
/*  Fungsi int putchar(int c) menampilkan/menaruh karakter yang sudah didapatkan pada layar.				 */
/*  Fungsi ini membaca hanya sebuah karakter pada satu waktu.												 */
/*	-------------------------------------------------------------------------------------------------------	 */	

int main( ) {

   int c;

   printf( "Enter a value :");
   c = getchar( );

   printf( "\nYou entered: ");
   putchar( c );

   return 0;
}