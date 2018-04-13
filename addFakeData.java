package test;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

public class Main {
	public static void main(String[] args) throws IOException {
		addCustomers();
		addTransactions();
	}
	public static void addCustomers() throws IOException {
		File f=new File("/Users/Chenjing/Desktop/fakedata.sql");
    		FileWriter fw = new FileWriter(f, true);
    		PrintWriter pw = new PrintWriter(fw);
    		for(int i = 1;i <= 1000;++i) {
    			String email = i+"fake@pitt.edu";
    			int kind = (int)(Math.random()*2)+1;
    			String password = encryption(encryption(i+"")+"123456");
    			String sql = "INSERT INTO customers (customer_email,customer_name,customer_password,customer_kind)"+
    		"VALUE ("+"'" + email + "',"+"'" + i+"fake" + "',"+"'" + password + "',"+"'" + kind + "'"+");";
    			pw.println(sql);
    			pw.flush();
    		}
	}
	
	public static void addTransactions() throws IOException {

		String[] store = { "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL", "GA", "HI", "ID", "IL", "IN",
				"IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM",
				"NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV",
				"WI", };
		String[] books = { "0061124958", "0061146307", "0061565318", "0307389731", "0374531269", "037570504X",
				"0375725784", "0439708184", "0451524934", "0553380168", "0671894412", "0679745580", "0810993139",
				"1491962291", "1641520434", "1787125939" };
		String[] prices = { "6.29", "5.12", "11.95", "10.87", "7.69", "0.65", "10.84", "6.99", "5.55", "10.69", "14",
				"13.95", "9.59", "24.9", "11.99", "35.99" };
		String[] category = { "paperback", "Hardcover", "Kindle", "Audio CD", "Audiobook" };
		File f = new File("/Users/Chenjing/Desktop/fakedata.sql");
		FileWriter fw = new FileWriter(f, true);
		PrintWriter pw = new PrintWriter(fw);
		for (int i = 0; i < 10000; ++i) {
			String orderId = encryption(i + "");
			String orderDate = randDate();
			String orderStatus = "Paid";
			int customerId =  (int) (Math.random() *1000)+1;
			String storeId = store[(int) (Math.random() * store.length)];
			String price = String.format("%.2f", Math.random() * 60);
			String sql = "INSERT INTO transactions (order_id,order_date,order_status,customer_id,store_id,total_cost_price) "
					+ "VALUE (" + "'" + orderId + "'," + "'" + orderDate + "'," + "'" + orderStatus + "'," +"'" + customerId + "',"+ "'"
					+ storeId + "'," + "'" + price + "'" + ");";
			pw.println(sql);
			pw.flush();
			for (int k = 0; k < (int) (Math.random() * 4) + 1; ++k) {
				int tmp = (int) (Math.random() * books.length);
				String bookId = books[tmp];
				String singlePrice = prices[tmp];
				int quantiry = (int) (Math.random() * 3) + 1;
				String category_ = category[(int) (Math.random() * category.length)];
				sql = "INSERT INTO books_transactions (order_id,book_id,price,quantity,category) VALUE (" + "'"
						+ orderId + "'," + "'" + bookId + "'," + "'" + singlePrice + "'," + "'" + quantiry + "'," + "'"
						+ category_ + "'" + ");";
				pw.println(sql);
				pw.flush();
			}
		}
		pw.close();
	
	}
	
	public static String encryption(String plainText) {
		String re_md5 = new String();
		try {
			MessageDigest md = MessageDigest.getInstance("MD5");
			md.update(plainText.getBytes());
			byte b[] = md.digest();

			int i;

			StringBuffer buf = new StringBuffer("");
			for (int offset = 0; offset < b.length; offset++) {
				i = b[offset];
				if (i < 0)
					i += 256;
				if (i < 16)
					buf.append("0");
				buf.append(Integer.toHexString(i));
			}

			re_md5 = buf.toString();

		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
		}
		return re_md5;
	}

	public static String randDate() {
		Date randomDate = randomDate("2013-01-01", "2018-03-01");
		DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");

		return dateFormat.format(randomDate);

	}

	private static Date randomDate(String beginDate, String endDate) {
		try {
			SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
			Date start = format.parse(beginDate);// 构造开始日期
			Date end = format.parse(endDate);// 构造结束日期
			// getTime()表示返回自 1970 年 1 月 1 日 00:00:00 GMT 以来此 Date 对象表示的毫秒数。
			if (start.getTime() >= end.getTime()) {
				return null;
			}
			long date = random(start.getTime(), end.getTime());
			return new Date(date);
		} catch (Exception e) {
			e.printStackTrace();
		}
		return null;
	}

	private static long random(long begin, long end) {
		long rtn = begin + (long) (Math.random() * (end - begin));
		// 如果返回的是开始时间和结束时间，则递归调用本函数查找随机值
		if (rtn == begin || rtn == end) {
			return random(begin, end);
		}
		return rtn;
	}
}