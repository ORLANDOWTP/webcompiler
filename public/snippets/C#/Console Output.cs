using System;

/* --------------------------------------------------- */
/* 		PERBEDAAN 2 SYNTAX OUTPUT PADA BAHASA C#       */
/* --------------------------------------------------- */
/* |  Console.WriteLine(); ||     Console.Write();   | */
/* ------------------------||------------------------- */
/* | - Selalu ditambahkan  || - Output satu/lebih    | */
/* |   sebuah baris pada   ||   nilai ke layar tanpa | */
/* |   akhir sebuah string ||   ada baris baru pada  | */
/* |   (new line).         ||   akhir string.		 | */
/* --------------------------------------------------- */
 

class Exercise
{
	static void Main()
	{
		/* Deklarasi setiap variabel */
		String FullName = "Anselme Bogos";
		int Age = 15;
		double Hsalary = 22.74;

		/* Berikut contoh Console.Write(); */
		Console.Write("{0} ",Age);
		Console.Write("{0}",Hsalary);
		/* ------------------------------- */

		/* Berikut contoh Console.WriteLine(); */
		Console.WriteLine ("Full Name: {0}", FullName);
		Console.WriteLine("Age: {0}", Age);

		Console.WriteLine("Distance: {0}", Hsalary);
		/* ------------------------------- */
	}
}