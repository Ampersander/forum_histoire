package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestAdminShowAllUserAndDeleteUser {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "https://www.google.com/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testAdminShowAllUserAndDeleteUser() throws Exception {
    driver.get("http://127.0.0.1:8080/login");
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("admin");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("root");
    driver.findElement(By.id("_submit")).click();
    driver.findElement(By.linkText("Accès à l'administration")).click();
    driver.findElement(By.linkText("Liste des utilisateurs web")).click();
    assertEquals("test", driver.findElement(By.xpath("//body[@id='page-top']/div/div/div[2]/div[2]/div/h5")).getText());
    assertEquals("Nom : test \n Email : test@hotmail.com", driver.findElement(By.xpath("//body[@id='page-top']/div/div/div[2]/div[2]/div/p")).getText());
    driver.findElement(By.xpath("(//a[contains(text(),'Show profil')])[2]")).click();
    assertEquals("Nom d'utilisateur : test", driver.findElement(By.xpath("//div[@id='content']/div/p[2]")).getText());
    driver.findElement(By.xpath("(//a[contains(text(),'Delete profil')])[10]")).click();
    assertEquals("test70 est bien supprimé.", driver.findElement(By.xpath("//body[@id='page-top']/div/div")).getText());
    driver.findElement(By.linkText("Déconnexion")).click();
    driver.get("http://127.0.0.1:8080/login");
    driver.findElement(By.linkText("Creer un compte")).click();
    driver.findElement(By.id("appbundle_user_username")).click();
    driver.findElement(By.id("appbundle_user_username")).clear();
    driver.findElement(By.id("appbundle_user_username")).sendKeys("test70");
    driver.findElement(By.id("appbundle_user_email")).click();
    driver.findElement(By.id("appbundle_user_email")).clear();
    driver.findElement(By.id("appbundle_user_email")).sendKeys("test70@gmail.com");
    // ERROR: Caught exception [unknown command []]
    driver.findElement(By.id("appbundle_user_plainPassword_first")).click();
    driver.findElement(By.id("appbundle_user_plainPassword_first")).clear();
    driver.findElement(By.id("appbundle_user_plainPassword_first")).sendKeys("test70");
    driver.findElement(By.id("appbundle_user_plainPassword_second")).click();
    driver.findElement(By.id("appbundle_user_plainPassword_second")).clear();
    driver.findElement(By.id("appbundle_user_plainPassword_second")).sendKeys("test70");
    driver.findElement(By.id("appbundle_user_submit")).click();
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("test70");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("test70");
    driver.findElement(By.id("_submit")).click();
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
