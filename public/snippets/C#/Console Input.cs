using system;

/* --------------------------------------------------- */
/* 		 PERBEDAAN 2 SYNTAX INPUT PADA BAHASA C#       */
/* --------------------------------------------------- */
/* |  console.ReadLine();  ||     Console.Read();    | */
/* ------------------------||------------------------- */
/* | - Dapat assign        || - Dapat assign 1 char  | */
/* |   sebuah baris string.||   atau berfungsi untuk | */
/* |					   ||   menunggu inputan user| */
/* |                       ||   seperti getchar() pd | */
/* |                       ||   bahasa C. 			 | */
/* --------------------------------------------------- */

class orderprocessing
{
	static void Main()
	{
		/* Deklarasi variabel string */
		string nama;

		/* Berfungsi sebagai penerima input dari stdin (keyboard) */
		nama = Console.ReadLine();

		Console.Write("Press enter to continue..");
		Console.Read();

		Console.WriteLine("{0}",nama);
		
	}
}